<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(),
            'name' => fake()->words(5, true),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'discount' => fake()->randomElement(['10', '15', '20', '25', '30']),
            'price' => fake()->randomElement(['1000', '1500', '2000', '2500', '3000']),
            'description' => fake()->realText()
        ];
    }
}
