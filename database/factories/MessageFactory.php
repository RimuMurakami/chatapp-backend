<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'channel_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 6),
            'message' => fake()->realTextBetween(5, 30),
            'type' => fake()->randomElement(['text']),
        ];
    }
}
