<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
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
            'name' => ['required'],
            'password' => ['required', 'min:5'],
            'email' => ['required', 'email', 'unique:users,email'],
            'peran' => ['required']
        ]);

        // dd($request->Peran);

        // error default peran admin
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => $request->peran
        ]);

        return redirect('pengguna')->with('notif', 'tambah pengguna berhasil');
    }

    public function edit(User $user)
    {
        return view('edit-pengguna', ['title' => 'Edit Pengguna', 'data' => $user]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'min:4', 'max:100'],
            'peran' => ['required']
        ]);

        $pengguna = User::findOrFail($id);

        // pengecekan apakah email sudah terdaftar
        if ($request->email !== $pengguna->email) {
            $cekEmail = User::where('email', $request->email)->exists();

            if ($cekEmail) {
                return back()->with('warning', 'Email Sudah Terdaftar');
            }
        }

        // cek apakah password kosong
        if (empty($request->password)) {
            $pengguna->update([
                'password' => $pengguna->password
            ]);
        } else {
            $pengguna->update([
                'password' => Hash::make($request->password)
            ]);
        }

        User::WHERE('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'peran' => $request->peran
        ]);

        return redirect('pengguna')->with('notif', 'Edit Pengguna Berhasil');
    }

    public function delete(User $user)
    {

        // dd($user);

        User::WHERE('id', $user->id)->delete();

        return redirect('/pengguna')->with('notif', 'Menghapus Pengguna Berhasil');
    }
}
