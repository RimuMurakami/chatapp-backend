<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert([
            ['channel_id' => 1, 'user_id' => 1, 'message' => '自分だけのチャンネル。メモ等に使えます！', 'type' => 'text']
        ]);
    }
}
