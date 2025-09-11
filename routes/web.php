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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('home')->middleware('auth');
Route::get('/tambah-pengguna', [PenggunaController::class, 'create'])->middleware('auth');
Route::get('/edit-pengguna/{user}', [PenggunaController::class, 'edit'])->middleware('auth');
Route::post('/pengguna', [PenggunaController::class, 'store']);
Route::put('/pengguna/{user}', [PenggunaController::class, 'update']);
Route::delete('/pengguna/{user}/hapus', [PenggunaController::class, 'delete']);

Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware('auth');
Route::get('/tambah-pelanggan', [PelangganController::class, 'create'])->middleware('auth');
Route::get('/edit-pelanggan/{pelanggan}', [PelangganController::class, 'edit'])->middleware('auth');
Route::post('/pelanggan', [PelangganController::class, 'store']);
Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/{pelanggan}/hapus', [PelangganController::class, 'delete']);

Route::get('/produk', [ProdukController::class, 'index'])->middleware('auth');
Route::get('/tambah-produk', [ProdukController::class, 'create'])->middleware('auth');
Route::get('edit-produk/{produk}', [ProdukController::class, 'edit'])->middleware('auth');
Route::get('/detail-produk/{produk}', [ProdukController::class, 'detailproduk'])->middleware('auth');
Route::post('/produk', [ProdukController::class, 'store']);
Route::put('/produk/{produk}', [ProdukController::class, 'update']);
Route::delete('/produk/{produk}/hapus', [ProdukController::class, 'delete']);

Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('auth');
Route::get('/detail-penjualan/{penjualan}', [PenjualanController::class, 'detailPenjualan'])->middleware('auth');
Route::get('/penjualan/download-pdf', [PenjualanController::class, 'pdf'])->middleware('auth');
Route::get('/tambah-penjualan', [PenjualanController::class, 'create'])->middleware('auth');
Route::post('/penjualan', [PenjualanController::class, 'store']);
Route::delete('/penjualan/{penjualan}/hapus', [PenjualanController::class, 'destroy'])->middleware('auth');