<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('/pengguna', ['title' => 'pengguna', 'data' => Pengguna::all()]);
    }
}
