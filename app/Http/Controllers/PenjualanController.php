<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index ()
    {
        $data = [
            'penjualans' => penjualan::all(),
            'user' => Auth::user(),
            'title' => 'Data Penjualan'
        ];
        return view('penjualan', $data);
    }

}
