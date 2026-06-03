<?php

namespace Database\Factories;

use App\Models\MenuMakanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MenuMakanan>
 */
class MenuMakananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_makanan' => fake()->word(),
            'harga' => fake()->numberBetween(10000,50000),
            'is_available' => true,
            
        ];
    }
}
