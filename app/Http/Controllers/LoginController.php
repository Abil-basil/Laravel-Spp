<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index() 
    {
        // $data[] = ['keterangan' => 'gagal'];

        return view('login', ['keterangan' => 'Login']);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', ':dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Login Failed!');

        // return back()->withErrors([
        //     'email' => 'Login Failed',
        // ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
