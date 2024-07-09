<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessLevelSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('access_level_spaces')->insert([
            ['id' => 1,'access_name' => 'public'],
            ['id' => 2,'access_name' => 'private'],
        ]);
    }
}
