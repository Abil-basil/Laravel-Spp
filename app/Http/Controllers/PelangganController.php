<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('/pelanggan', ['title' => 'pelanggan', 'data' => Pelanggan::all()]);
    }

    public function create()
    {
        return view('/tambah-pelanggan', ['title' => 'pelanggan']);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'NamaPelanggan' => ['required'],
            'Alamat' => ['required'],
            'NoTelp' => ['required', 'min:10']
        ]);

        Pelanggan::create([
            'NamaPelanggan' => $request->NamaPelanggan,
            'Alamat' => $request->Alamat,
            'NoTelp' => $request->NoTelp
        ]);

        return redirect('pelanggan')->with('notif', 'Tambah Pelanggan Berhasil');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('edit-pelanggan', ['title' => 'Edit Pelanggan', 'data' => $pelanggan]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'Nama' => ['required'],
            'Alamat' => ['required'],
            'NoTelp' => ['required', 'min:10']
        ]);

        Pelanggan::where('id', $id)->update([
            'NamaPelanggan' => $request->Nama,
            'Alamat' => $request->Alamat,
            'NoTelp' => $request->NoTelp
        ]);

        return redirect('pelanggan')->with('notif', 'Edit Pelanggan Berhasil');
    }

    public function delete(Pelanggan $pelanggan)
    {
        Pelanggan::where('id', $pelanggan->id)->delete();

        return redirect('pelanggan')->with('notif', 'Hapus Pelanggan Berhasil');
    }
}
