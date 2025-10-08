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
Route::delete('/logout', [LoginController::class, 'logout']);

// peran:admin,petugas => jalankan middleware peran yang sudah di daftarkan di Bootstrap.App.php lalu kirimkan 2 nilai yaitu admin dan petugas, maka middleware peran akan menangkap dan membandingkan apakah bisa mengakses route atau tidak

// route yang bisa di akses oleh admin dan petugas yang sudah login
Route::middleware(['auth', 'peran:admin,petugas'])->group(function () {
    // CRUD Produk
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/tambah-produk', [ProdukController::class, 'create']);
    Route::get('edit-produk/{produk}', [ProdukController::class, 'edit']);
    Route::get('/detail-produk/{produk}', [ProdukController::class, 'detailproduk']);
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{produk}', [ProdukController::class, 'update']);
    Route::delete('/produk/{produk}/hapus', [ProdukController::class, 'delete']);
    
    // CRUD Penjualan
    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::get('/detail-penjualan/{penjualan}', [PenjualanController::class, 'detailPenjualan']);
    Route::get('/penjualan/download-pdf', [PenjualanController::class, 'pdf']);
    Route::get('/tambah-penjualan', [PenjualanController::class, 'create']);
    Route::post('/penjualan', [PenjualanController::class, 'store']);
    Route::delete('/penjualan/{penjualan}/hapus', [PenjualanController::class, 'destroy']);
    
    // Route yang hanya bisa di akses oleh admin
    Route::middleware(['peran:admin'])->group(function() {
        // CRUD Pengguna
        Route::get('/pengguna', [PenggunaController::class, 'index'])->name('home');
        Route::get('/tambah-pengguna', [PenggunaController::class, 'create']);
        Route::get('/edit-pengguna/{user}', [PenggunaController::class, 'edit']);
        Route::post('/pengguna', [PenggunaController::class, 'store']);
        Route::put('/pengguna/{user}', [PenggunaController::class, 'update']);
        Route::delete('/pengguna/{user}/hapus', [PenggunaController::class, 'delete']);
    
        // CRUD Pelanggan
        Route::get('/pelanggan', [PelangganController::class, 'index']);
        Route::get('/tambah-pelanggan', [PelangganController::class, 'create']);
        Route::get('/edit-pelanggan/{pelanggan}', [PelangganController::class, 'edit']);
        Route::post('/pelanggan', [PelangganController::class, 'store']);
        Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update']);
        Route::delete('/pelanggan/{pelanggan}/hapus', [PelangganController::class, 'delete']);

    });
});