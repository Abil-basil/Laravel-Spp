<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    // untuk menampilkan semua data 
    public function index()
    {
        return view('daftar', ['keterangan' => 'registrasi']);
    }

    // untuk registrasi
    public function store(Request $request)
    {
        // dd($request->all());

        // pengecekan (validasi / validate)
        $validate = $request->validate([
            'username' => ['required', 'max:50', 'unique:users'],
            'email' => ['required', ':dns', 'unique:users'],
            'password' => ['required', 'min:5'],
            'peran' => ['required', 'in:admin,petugas']
        ]);

        // dd($validate);

        // enkrip password
        // $validate['password'] = Hash::make($validate['password']);

        //penambahan data otomatis
        // User::create($validate);

        // penambahan data manual
        // ini jika ada yang tidak sesuai dengan apa yang di inputkan dengan data di database
        User::create([
            'username' => $validate['username'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'peran' => $validate['peran']
        ]);

        // flash message versi panjang
        // $request->session()->flash('succes', 'registrasi berhasil!');

        return redirect('login')->with('succes', 'registrasi berhasil');
    }
}
