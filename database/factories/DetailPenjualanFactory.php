<?php

namespace Database\Factories;

use App\Models\Penjualan;
use App\Models\Produk;
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
            'PenjualanID' => Penjualan::inRandomOrder()->first()->id,
            'ProdukID' => Produk::inRandomOrder()->first()->id,
            'JumlahProduk' => fake()->numberBetween(10, 20),
            'Subtotal' => fake()->numberBetween(120000, 150000)
        ];
    }
}
