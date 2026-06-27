<?php

namespace App\Support;

final class Money
{
    public static function format(float|int|string|null $amount): string
    {
        return number_format(round((float) ($amount ?? 0), 2), 2, '.', '');
    }

    public static function add(float|int|string|null $left, float|int|string|null $right): string
    {
        return self::format((float) ($left ?? 0) + (float) ($right ?? 0));
    }

    public static function subtract(float|int|string|null $left, float|int|string|null $right): string
    {
        return self::format((float) ($left ?? 0) - (float) ($right ?? 0));
    }

    public static function multiply(float|int|string|null $amount, int|string|null $quantity): string
    {
        return self::format((float) ($amount ?? 0) * (int) ($quantity ?? 0));
    }
}
