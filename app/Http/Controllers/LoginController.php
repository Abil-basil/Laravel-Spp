<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    // untuk menampilkan seluruh data
    public function index() 
    {
        // $data[] = ['keterangan' => 'gagal'];

        return view('login', ['keterangan' => 'Login']);
    }

    // untuk login
    public function store(Request $request)
    {
        // validasi atau pengecekan
        $credentials = $request->validate([
            'email' => ['required', ':dns'],
            'password' => ['required']
        ]);

        // untuk membandingkan data yang di inputkan dengan data yang ada di database (user)
        if (Auth::attempt($credentials))
        {
            // jika true buat ulang session
            $request->session()->regenerate();

            // jika true masuk ke '/admin'
            return redirect()->intended('/admin');
        }

        // jika false kirimkan "array loginError dengan value Login Failed!"
        return back()->with('loginError', 'Login Failed!');

        // return back()->withErrors([
        //     'email' => 'Login Failed',
        // ])->onlyInput('email');
    }

    // untuk logout
    public function logout(Request $request)
    {
        Auth::logout();

        // hapus session lama
        $request->session()->invalidate();

        // buat ulang session
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
