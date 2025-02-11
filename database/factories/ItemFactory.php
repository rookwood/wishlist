<?php

namespace Database\Factories;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(asText: true),
            'url' => fake()->url,
            'price' => fake()->numberBetween(100, 999999),
            'quantity' => fake()->numberBetween(1, 3),
            'notes' => fake()->sentence(),
            'wishlist_id' => fn () => Wishlist::factory(),
        ];
    }
}
