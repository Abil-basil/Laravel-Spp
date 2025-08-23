<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public $title = 'pengguna';

    public function index()
    {
        return view('/pengguna', ['title' => 'pengguna', 'data' => User::all()]);
    }

    public function create()
    {
        return view('/tambah-pengguna', ['title' => 'pengguna']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Username' => ['required'],
            'Password' => ['required', 'min:5'],
            'Email' => ['required', 'email'],
            'Peran' => ['required']
        ]);

        // dd($request->Peran);

        // error default peran admin
        User::create([
            'name' => $request->Username,
            'email' => $request->Email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->Password),
            'peran' => $request->Peran,
        ]);

        return redirect('pengguna')->with('notif', 'tambah pengguna berhasil');
    }

    public function delete(User $user)
    {

        // dd($user);

        User::WHERE('id', $user->id)->delete();

        return redirect('/pengguna')->with('notif', 'Menghapus Pengguna Berhasil');
    }
}
