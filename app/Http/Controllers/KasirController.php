<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function index ()
    {
        $data = [
            'user' => Auth::user(),
            'kasir' => User::all(),
            'title' => 'Data Kasir'
        ];

        return view('/kasir', $data);
    }

    public function detail (User $User)
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'History Transaksi Penjualan Oleh ' . $User->username,
            'data' => $User->penjualan
        ];

        return view('/detail-kasir', $data);
    }
}
