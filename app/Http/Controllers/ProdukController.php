<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\produk;


class ProdukController extends Controller
{
    public function index()
    {
        $data = [
            'produk' => produk::all(),
            'user' => Auth::user(),
            'title' => 'List Produk'
        ];
        return view('admin', $data);
    }
}
