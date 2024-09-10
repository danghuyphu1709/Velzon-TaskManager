<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_tables')->insert([
            ['id' => 1,'role_name' => 'Quản trị viên'],
            ['id' => 2,'role_name' => 'Thành viên'],
        ]);
    }
}
