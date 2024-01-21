<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupUser>
 */
class GroupUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->all();
        $groupIds = Group::pluck('id')->all();

        return [
            'user_id' => fake()->randomElement($userIds),
            'group_id' => fake()->randomElement($groupIds),
            'role' => fake()->randomElement(['admin', 'member']),
        ];
    }
}
