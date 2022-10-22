<?php

namespace App\Enum;

abstract class Enum
{
    /**
     * @return array
     */
    public static function all(): array
    {
        return [];
    }

    /**
     * @return array|int|string
     */
    public static function random(): int|array|string
    {
        $key = array_rand(static::all());

        return static::all()[$key];
    }

    /**
     * @param string $key
     * @return array|int|string
     */
    public static function allInArrays(string $key): int|array|string
    {
        return array_map(fn($role) => [$key => $role], static::all());
    }
}
