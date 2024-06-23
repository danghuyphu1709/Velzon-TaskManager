<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('access_level_tables')->insert([
            ['access_name' => 'public'],
            ['access_name' => 'group'],
            ['access_name' => 'private'],
        ]);
    }
}
