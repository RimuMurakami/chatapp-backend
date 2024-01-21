<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Channel;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Message;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Riccha',
            'email' => 'test@example.com',
            'password' => Hash::make('asdfasdf'),
        ]);

        Group::factory(10)->create();
        GroupUser::factory(10)->create();
        Channel::factory(10)->create();
        Task::factory(10)->create();
        Message::factory(100)->create();
    }
}
