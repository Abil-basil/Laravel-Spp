<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('home')->middleware('auth');
Route::get('/tambah-pengguna', [PenggunaController::class, 'create'])->middleware('auth');
Route::delete('/pengguna/{user}/hapus', [PenggunaController::class, 'delete']);
Route::post('/pengguna', [PenggunaController::class, 'store']);

Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware('auth');
Route::get('/tambah-pelanggan', [PelangganController::class, 'create'])->middleware('auth');

Route::get('/produk', [ProdukController::class, 'index'])->middleware('auth');
Route::get('/tambah-produk', [ProdukController::class, 'create'])->middleware('auth');
Route::get('/detail-produk/{produk}', [ProdukController::class, 'detailproduk'])->middleware('auth');

Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('auth');
Route::get('/detail-penjualan/{penjualan}', [PenjualanController::class, 'detailPenjualan'])->middleware('auth');
Route::get('/penjualan/download-pdf', [PenjualanController::class, 'pdf'])->middleware('auth');
