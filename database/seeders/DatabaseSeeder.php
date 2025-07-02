<?php

namespace Database\Seeders;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\produk;
use App\Models\penjualan;
use Illuminate\Support\Str;
use App\Models\User;
use Database\Factories\PelangganFactory;
use Database\Factories\PenjualanFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        // user
        // User::factory(4)->recycle(
        //     User::create([
        //         'username' => 'ahay',
        //         'email' => 'admin@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => bcrypt('admin'),
        //         'Peran' => 'admin',
        //         'remember_token' => Str::random(10),
        //     ])
        //   )->create();
            
            // User::factory(4)->create();
            // User::create([
            //     'username' => 'ahay',
            //     'email' => 'admin@gmail.com',
            //     'email_verified_at' => now(),
            //     'password' => bcrypt('admin'),
            //     'Peran' => 'admin',
            //     'remember_token' => Str::random(10),
            // ]);
            // Pelanggan::factory(10)->create();
            // penjualan::factory(15)->create();
            // produk::factory(10)->create();
            // DetailPenjualan::factory(20)->create();
        
            

        produk::factory(10)->create();

        penjualan::factory(10)->recycle([
            Pelanggan::factory(5)->create(),
            User::factory(4)->recycle(
                User::create([
                    'username' => 'ahay',
                    'email' => 'admin@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('admin'),
                    'Peran' => 'admin',
                    'remember_token' => Str::random(10),
                ])
            )->create(),
        ])->create();

        DetailPenjualan::factory(25)->create();


        // DetailPenjualan::factory(20)->recycle([
        //     penjualan::factory(10)->create(),
        //     produk::factory(5)->create(),
        // ])->create();
        

        // DetailPenjualan::factory(20)->recycle(
        //     [
        //         penjualan::factory(15)->recycle(
        //             [
        //                 Pelanggan::factory(15)->create(),
        //                 User::factory(4)->recycle(
        //                     User::create([
        //                         'username' => 'ahay',
        //                         'email' => 'admin@gmail.com',
        //                         'email_verified_at' => now(),
        //                         'password' => bcrypt('admin'),
        //                         'Peran' => 'admin',
        //                         'remember_token' => Str::random(10),
        //                     ])
        //                 )->create(),
        //             ]
        //         )->create(),
        //         produk::factory(10)->create()
        //     ]
        // )->create();

        // produk::factory(10)->create();
        // Pelanggan::factory(15)->create();

        // penjualan::factory(20)->recycle(
        //     Pelanggan::factory(10)->create()
        // )->recycle(
        //     User::factory(4)->create()
        // )->create();

        // Penjualan::Factory(20)->recycle([
        //     Pelanggan::Factory(10)->create(),
        //     User::Factory(5)->create()
        // ])->create();

    }
}
