<?php

namespace App\Enums;

enum  StatusSystem: string
{
    case DEACTIVATE = '0';

    case ACTIVATE = '1';

    case COMPLETE = '2';
    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

    public function label(): string
    {
        return match($this) {
            self::ACTIVATE => 'Đang triển khai',
            self::DEACTIVATE => 'Ngừng triển khai',
            self::COMPLETE => 'Đã hoàn thành',
        };
    }
}
