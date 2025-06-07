<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\produk;
use Illuminate\Support\Str;
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
        // User::factory(10)->create();
        

        User::factory(4)->create();
        
        User::create([
            'username' => 'ahay',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'Peran' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        produk::factory(10)->create();
        Pelanggan::factory(15)->create();
    }
}
