<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function index()
    {
        $data = [
            'pelanggan' => Pelanggan::all(),
            'user' => Auth::user(),
            'title' => 'List Pelanggan'
        ];

        return view('/pelanggan', $data);
    }

    public function detail (Pelanggan $pelanggan)
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'History Transaksi Pelanggan Oleh ' . $pelanggan->NamaPelanggan,
            'data' => $pelanggan->penjualan
        ];

        return view('/detail-kasir', $data);
    }
}
