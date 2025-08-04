<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $barang = [
            'laptop', 'mouse', 'keyboard',
            'cpu', 'casing'
        ];

        return [
            'NamaProduk' => fake()->randomElement($barang),
            'Harga' => fake()->numberBetween(1000, 10000),
            'Stok' => fake()->numberBetween(1, 20)
        ];
    }
}
