<?php

namespace App\Enum;

class Role extends Enum
{
    public const USER = 'user';

    public const EMPLOYEE = 'employee';

    public const ADMIN = 'admin';

    /**
     * @return int[]
     */
    public static function all(): array
    {
        return [
            self::USER,
            self::EMPLOYEE,
            self::ADMIN,
        ];
    }
}
