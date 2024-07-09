<?php

namespace App\Enums;

enum  TypeUnitEnum: string
{
    case public = '1';
    case private = '2';
    case group = '3';
    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
