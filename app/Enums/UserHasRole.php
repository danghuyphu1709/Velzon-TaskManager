<?php

namespace App\Enums;

enum  UserHasRole: string
{
    case admin = '1';

    case member = '2';
    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}

