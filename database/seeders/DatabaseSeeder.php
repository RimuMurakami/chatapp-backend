<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Channel;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Message;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            // GroupSeeder::class,
            // GroupUserSeeder::class,
            // ChannelSeeder::class,
            // MessageSeeder::class,
        ]);

        User::factory(5)->create();
        Group::factory(10)->create();
        GroupUser::factory(20)->create();
        Channel::factory(10)->create();
        Task::factory(10)->create();
        Message::factory(100)->create();
    }
}
