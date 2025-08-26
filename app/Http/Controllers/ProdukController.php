<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('/produk', ['title' => 'produk', 'data' => Produk::all()]);
    }

    public function detailproduk(Produk $produk)
    {
        $data = [
            'title' => 'Detail Penjualan Dari Barang - ' . $produk->NamaProduk,
            'isi' => $produk->DetailPenjualan
        ];

        return view('detail-penjulan', $data);
    }

    public function create()
    {
        return view('/tambah-produk', ['title' => 'produk']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => ['required'],
            'Harga' => ['required'],
            'Stok' => ['required']
        ]);
        
        // dd($request);

        Produk::create([
            'NamaProduk' => $request->Nama,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok
        ]);

        return redirect('produk')->with('notif', 'Menambahkan Produk Berhasil');
    }

    public function delete(Request $request)
    {
        Produk::where('id', $request->id)->delete();

        return redirect('produk')->with('notif', 'Hapus Produk Berhasil');
    }
}
