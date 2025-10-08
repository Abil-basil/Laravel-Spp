<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PeranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // ... => symbol variadic yang bisa menampung lebih dari satu nilai
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        // mengambil peran yang sedang login
        $peran = Auth::user()->peran;

        // cek apakah peran yang login di ijinkan
        if (!in_array($peran, $roles)) {
            abort(403, 'Anda Tidak Memiliki Akses');
        }
        return $next($request);

        // in_array di gunakan untuk mengecek array apakah ada 
        // contoh : 
        // $buah = ['mangga', 'anggur']
        // in_array('rambutan', $buah) => false

        // $roles di ambil dari routes ['peran:admin']

    }
}
