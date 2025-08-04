<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/tambah-pengguna', [PenggunaController::class, 'create']);

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/tambah-pelanggan', [PelangganController::class, 'create']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/tambah-produk', [ProdukController::class, 'create']);
Route::get('/detail-produk/{produk}', [ProdukController::class, 'detailproduk']);

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/detail-penjualan/{penjualan}', [PenjualanController::class, 'detailPenjualan']);
Route::get('/penjualan/download-pdf', [PenjualanController::class, 'pdf']);
