<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('/penjualan', ['title' => 'penjualan', 'data' => Penjualan::all()]);
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
        $request->validate([
            'penggunaId' => ['required'],
            'pelangganId' => ['required'],
            'produkId' => ['required'],
            'jumlah' => ['required']
        ]);

        // value untuk langsung mengambil value nya
        // get() -> untuk mengambil banyak data
        // first() -> untuk mengambil satu baris pertama
        // value('colomn) -> untuk mengambil colomn nya saja
        $produk = Produk::where('id', $request->produkId)->first();
        
        if ($request->jumlah <= $produk->Stok)
        {
            $penjualan = Penjualan::create([
                'TanggalPenjualan' => now(),
                'TotalHarga' => $request->jumlah * $produk->Harga,
                'PenggunaID' => $request->penggunaId,
                'PelangganID' => $request->pelangganId
            ]);
    
            DetailPenjualan::create([
                'PenjualanID' => $penjualan->id,
                'ProdukID' => $request->produkId,
                'JumlahProduk' => $request->jumlah,
                'Subtotal' => $penjualan->TotalHarga
            ]);

            $produk->update([
                'Stok' => $produk->Stok - $request->jumlah,
            ]);
    
            return redirect('penjualan')->with('notif', 'tambah penjualan berhasil');
        }

        return back()->with('warning', 'stok tidak mencukupi');
    }

    public function pdf()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('/penjualan-pdf', ['title' => 'penjualan', 'data' => Penjualan::all()]));
        $dompdf->render();
        $dompdf->stream('penjualan.pdf', array('Attachment' => false));

    }
}