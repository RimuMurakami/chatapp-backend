<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => fake()->numberBetween(1, 10),
            'name' => fake()->realTextBetween(10, 15),
            'overview' => fake()->realTextBetween(10, 20),
            'type' => fake()->randomElement(['private']),
        ];
    }
}
