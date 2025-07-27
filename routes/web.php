<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/pengguna', [PenggunaController::class, 'index']);
