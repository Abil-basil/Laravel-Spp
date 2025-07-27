<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class PenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Username' => fake()->name(),
            'Password' => Hash::make('password'),
            'Email' => fake()->unique()->safeEmail(),
            'Peran' => Arr::random(['Admin', 'Petugas'])
        ];
    }
}
