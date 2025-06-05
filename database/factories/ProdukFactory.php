<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produk>
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
            'gelas', 'piring', 'sendok',
            'kaca', 'gayung', 'pager',
            'handphone', 'kardus', 'buku'
        ];

        return [
            'NamaProduk' => $this->faker->randomElement($barang),
            'Harga' => $this->faker->numberBetween(1, 50),
            'Stok' => $this->faker->numberBetween(1, 20),
        ];
    }
}
