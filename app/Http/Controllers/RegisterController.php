<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('daftar', ['keterangan' => 'registrasi']);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // pengecekan (validasi / validate)
        $validate = $request->validate([
            'username' => ['required', 'max:50', 'unique:users'],
            'email' => ['required', ':dns', 'unique:users'],
            'password' => ['required', 'min:5'],
            'peran' => ['required', Rule::in('admin', 'petugas')]
        ]);

        // enkrip password
        $validate['password'] = Hash::make($validate['password']);

        // penambahan data
        User::create($validate);

        // flash message versi panjang
        // $request->session()->flash('succes', 'registrasi berhasil!');

        return redirect('login')->with('succes', 'registrasi berhasil');
    }
}
