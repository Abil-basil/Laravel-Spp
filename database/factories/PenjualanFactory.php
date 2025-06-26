<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\penjualan>
 */
class PenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'TanggalPenjualan' => fake()->dateTimeBetween('-2 months', 'now'),
            'TotalHarga' => fake()->numberBetween(1, 50),
            'PelangganID' => Pelanggan::factory(),
            'UserID' => User::factory()
        ];
    }
}
