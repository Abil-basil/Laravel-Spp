<?php

namespace Database\Seeders;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Pengguna;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ahay',
            'email' => 'ahay@gmail.com',
            'password' => bcrypt('ahay'),
            'email_verified_at' => now(),
            'peran' => 'admin'
        ]);

        User::factory(4)->create();

        Pelanggan::create([
            'NamaPelanggan' => 'bagogo',
            'Alamat' => 'sukabumi',
            'NoTelp' => '078624314251'
        ]);

        Produk::create([
            'NamaProduk' => 'teh gelas',
            'Harga' => 2000,
            'Stok' => 100
        ]);

        Produk::create([
            'NamaProduk' => 'teh pucuk',
            'Harga' => 4000,
            'Stok' => 100
        ]);

        Penjualan::create([
            'TanggalPenjualan' => now(),
            'TotalHarga' => 20000,
            'PenggunaID' => 1,
            'PelangganID' => 1
        ]);

        DetailPenjualan::create([
            'PenjualanID' => 1,
            'ProdukID' => 1,
            'JumlahProduk' => 3,
            'Subtotal' => 6000
        ]);

        DetailPenjualan::create([
            'PenjualanID' => 1,
            'ProdukID' => 2,
            'JumlahProduk' => 3,
            'Subtotal' => 12000
        ]);

        // Penjualan::factory(10)->recycle(Pelanggan::factory(5)->create())->create();

        // Penjualan::factory(10)->recycle([
        //     Pelanggan::factory(5)->create()
        // ])->create();

        // DetailPenjualan::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
