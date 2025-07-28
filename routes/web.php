<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/pengguna', [PenggunaController::class, 'index']);

Route::get('/pelanggan', [PelangganController::class, 'index']);

Route::get('/produk', [ProdukController::class, 'index']);
