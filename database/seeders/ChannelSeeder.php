<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('channels')->insert([
            ['group_id' => '1', 'name' => 'マイチャンネル', 'overview' => '自分自身だけのチャンネルです。メモ等に使える。', 'type' => 'private', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
