<?php

namespace App\Enums;

use App\Models\Tables;
use App\Models\User;
use mysql_xdevapi\Collection;

enum  SystemRoles: string
{
    case MASTER_ADMIN = '1';
    case ADMIN = '2';
    case GUEST =' 3';
    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

    public function label(): string
    {
        return match($this) {
            self::MASTER_ADMIN => 'Quan trị hệ thống',
            self::ADMIN => 'Quản trị viên',
            self::GUEST => 'Khách',
        };
    }

    public static function ArrayRolesSystem() : array
    {
        $array = [];
        $i = 1;
        foreach (self::values() as $value => $name) {
            $array[$i] = $name;
            $i++;
        }
        return $array;
    }

    public static function admins() :object
    {
        $users = User::query()->get();
        $admins = $users->filter(function ($user) {
            return $user->hasAnyRole(self::ArrayRolesSystem());
        });

        return $admins;
    }

    public static function checkRoleTable($code)
    {
        $table = Tables::query()->with(['users'])->where('code',$code)->first();

    }
}


