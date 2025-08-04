<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('/pelanggan', ['title' => 'pelanggan', 'data' => Pelanggan::all()]);
    }
}
