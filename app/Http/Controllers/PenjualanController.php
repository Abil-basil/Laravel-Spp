<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Penjualan';
        $data = Penjualan::all();

        if ($request->get('sort')) {
            $sort = $request->get('sort');
            $data = Penjualan::orderBy('created_at', $sort)->get();
        }

        return view('/penjualan', compact('title', 'data'));
    }

    public function detailPenjualan(Penjualan $penjualan)
    {
        $data = [
            'penjualan' => $penjualan,
            'details' => $penjualan->detailPenjualan,
            'title' => 'Detail Penjualan - ' . $penjualan->TanggalPenjualan
        ];

        return view('detail-penjulan', $data);
    } 

    public function create() {
        $data = [
            'title' => 'tambah penjualan',
            'pelanggan' => Pelanggan::select('id', 'NamaPelanggan')->get(),
            'produk' => Produk::all()
        ];
        
        return view('tambah-penjualan', $data);
    }

    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'pelangganId' => ['required'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.produkId' => ['required', 'exists:produks,id'], //exists:produks,id = dari tabel produk field id
            'items.*.jumlah' => ['required', 'numeric', 'min:1']
        ]);
        // items.* = setiap elemen di dalam items
        // items.*.produkId = setiap elemen di dalam items, produkId nya harus ada di tabel produk field id

        // try = coba -> coba jalankan code ini jika ada code yang gagal/error maka batalkan semua code dan alihkan ke catch
        // code yang berpotensi error
        // try catch di gunakan untuk menangani error dengan rapih
        try {
            // untuk memulai proses penyimpanan (mirip session_start)
            DB::beginTransaction(); // dipakai untuk melakukan beberapa query sekaligus dan harus di pastikan semuanya berhasil
            // ini di gunakan karna melakukan looping ke database dan memasukan banyak data 

            $totalHarga = 0;
            $items = [];

            // Validasi stok dan hitung total harga
            foreach ($request->items as $item) {
                $produk = Produk::where('id', $item['produkId'])->first();
                
                // pengecekan barang
                if (!$produk) {
                    return back()->with('warning', 'Produk tidak ditemukan');
                }
                
                // pengecekan stok
                if ($item['jumlah'] > $produk->Stok) {
                    return back()->with('warning', 'Stok ' . $produk->NamaProduk . ' tidak mencukupi. Stok tersedia: ' . $produk->Stok);
                }

                $subtotal = $item['jumlah'] * $produk->Harga; 
                $totalHarga += $subtotal; // total harga akan menyimpan harga sebelumnya di mauskan ke variable di atas

                $items[] = [
                    'produk' => $produk, // ini berisi object dari database produk
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $subtotal
                ];
            }
            // dd($items);

            // Buat penjualan
            $penjualan = Penjualan::create([
                'TanggalPenjualan' => now()->format('Y-m-d H:i:s'),
                'TotalHarga' => $totalHarga,
                'PenggunaID' => Auth::user()->id,
                'PelangganID' => $request->pelangganId
            ]);

            // Buat detail penjualan dan update stok
            foreach ($items as $item) {
                // $item['produk'] akan berisi satu object produk dari database
                DetailPenjualan::create([
                    'PenjualanID' => $penjualan->id,
                    'ProdukID' => $item['produk']->id, // (->) di gunakan untuk mengakses object
                    'JumlahProduk' => $item['jumlah'],
                    'Subtotal' => $item['subtotal']
                ]);

                // Update stok produk
                $item['produk']->update([
                    'Stok' => $item['produk']->Stok - $item['jumlah']
                ]);
            }

            // kalai code nya berhasil simpan permanen ke database
            DB::commit();
            return redirect('penjualan')->with('notif', 'Penjualan berhasil ditambahkan');

        } catch (\Exception $e) { // catch akan jalan ketika try ada yang error
            // jika DB::beginTransaction ada yang error batalkan semua perubahan
            DB::rollback();
            return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Penjualan $penjualan)
    {
        dd($penjualan->detailPenjualan); // isinya sesuai barang yang di masukan
        try {
            DB::beginTransaction();

            // Kembalikan stok produk sebelum menghapus
            foreach ($penjualan->detailPenjualan as $detail) {
                // dd($detail);
                $produk = $detail->produk;
                $produk->update([
                    'Stok' => $produk->Stok + $detail->JumlahProduk
                ]);
            }

            // Hapus penjualan (detail akan terhapus otomatis karena cascade)
            $penjualan->delete();

            DB::commit();
            return redirect('penjualan')->with('notif', 'Penjualan berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('warning', 'Gagal menghapus penjualan: ' . $e->getMessage());
        }
    }

    public function pdf()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('/penjualan-pdf', ['title' => 'penjualan', 'data' => Penjualan::all()]));
        $dompdf->render();
        $dompdf->stream('penjualan.pdf', array('Attachment' => false));
    }
}