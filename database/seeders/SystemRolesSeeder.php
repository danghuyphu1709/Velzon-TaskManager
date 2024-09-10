<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use \App\Enums\SystemRoles;
class SystemRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $masterAdmin = User::query()->where('email','phudhph30417@fpt.edu.vn')->first();

        foreach (SystemRoles::ArrayRolesSystem() as $roleName) {
            Role::create(['name' => $roleName]);
        }

        if ($masterAdmin){
            $masterAdmin->assignRole(SystemRoles::MASTER_ADMIN->name);
        }
    }
}
