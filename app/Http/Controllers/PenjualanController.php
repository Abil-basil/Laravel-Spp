<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Mpdf\Mpdf;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('/penjualan', ['title' => 'penjualan', 'data' => Penjualan::all()]);
    }

    public function detailPenjualan(Penjualan $penjualan)
    {
        $data = [
            'penjualan' => $penjualan,
            'details' => $penjualan->detailPenjualan,
            'title' => 'Detail Penjualan - ' . $penjualan->TanggalPenjualan
        ];

        return view('detail-penjulan', $data);
    } 

    public function pdf()
    {
        // $pdf = new mpdf();
        // $pdf->WriteHTML('<h1>hello world</h1>');
        // $pdf->OutPut();
    }
}
