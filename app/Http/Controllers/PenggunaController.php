<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'email' => ['required', 'email'],
            'peran' => ['required']
        ]);

        // dd($request->Peran);

        // error default peran admin
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'peran' => ['required']
        ]);

        User::WHERE('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
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
