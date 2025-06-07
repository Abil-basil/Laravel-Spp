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
            'user' => Auth::user()
        ];

        return view('/pelanggan', $data);
    }
}
