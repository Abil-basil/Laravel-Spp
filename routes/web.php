<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', [ProdukController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'] );
Route::post('/logout', [LoginController::class, 'logout'] );

Route::get('/daftar', [RegisterController::class, 'index'] )->middleware('guest');
Route::post('/daftar', [RegisterController::class, 'store'] );

Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('auth');

Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware('auth');
Route::get('/detail-pelanggan/{pelanggan:id}', [PelangganController::class, 'detail'])->middleware('auth');

Route::get('/kasir', [KasirController::class, 'index'])->middleware('auth');
Route::get('/detail-kasir/{user:id}', [KasirController::class, 'detail'])->middleware('auth');




