<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\penjualan;
use App\Models\produk;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index ()
    {
        $data = [
            'penjualans' => penjualan::all(),
            'user' => Auth::user(),
            'title' => 'Data Penjualan'
        ];
        return view('penjualan', $data);
    }

    public function detail ()
    {
        $data = [
            'isi' => DetailPenjualan::all(),
            'user' => Auth::user(),
            'title' => 'Detail Penjualan'
        ];

        return view('/detail-penjualan', $data);
    }

    public function produk (produk $produk)
    {
        $data = [
            'user' => Auth::user(),
            'isi' => $produk->detail,
            'title' => 'History Dari Barang ' . $produk->NamaProduk,
        ];

        return view('/detail-penjualan', $data);
    }

    public function penjualan (penjualan $penjualan)
    {
        $data = [
            'user' => Auth::user(),
            'isi' => $penjualan->detail,
            'title' => 'History Penjualan Di Tanggal ' . $penjualan->TanggalPenjualan,
        ];

        return view('/detail-penjualan', $data);
    }

}
