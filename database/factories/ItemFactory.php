<?php

namespace Database\Factories;

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
            'barcode' => fake()->unique()->numerify('####'),
            'item_code' => fake()->words(1, true),
            'item_name' => fake()->sentence(3),
            'unit_id' => mt_rand(1, 10),
        ];
    }
}
