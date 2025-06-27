<?php

namespace Database\Factories;

use App\Models\penjualan;
use App\Models\produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPenjualan>
 */
class DetailPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'PenjualanID' => penjualan::inRandomOrder()->first()->id,
            'ProdukID' => produk::inRandomOrder()->first()->id,
            'JumlahProduk' => fake()->numberBetween(10, 50),
            'Subtotal' => fake()->numberBetween(6, 40)
        ];
    }
}
