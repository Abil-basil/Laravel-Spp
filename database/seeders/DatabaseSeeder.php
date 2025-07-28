<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Pengguna;
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
        Pengguna::factory(5)->create();
        Pelanggan::factory(10)->create();
        Produk::factory(15)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
