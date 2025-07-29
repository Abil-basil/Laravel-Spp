<?php

namespace Database\Seeders;

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
        Produk::factory(15)->create();

        Penjualan::factory(20)->recycle([
            Pelanggan::factory(10)->create(),
            Pengguna::factory(4)->recycle(
                Pengguna::create([
                    'Username' => 'Ahay',
                    'Password' => bcrypt('ahay'),
                    'Email' => 'Ahay@gmail.com',
                    'Peran' => 'Admin',
                ])
            )->create()
        ])->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
