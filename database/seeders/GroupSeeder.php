<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            ['name' => 'マイグループ', 'description' => '自分自身だけが所属するグループです。', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
