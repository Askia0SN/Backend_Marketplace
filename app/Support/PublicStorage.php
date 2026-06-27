<?php

namespace App\Support;

final class PublicStorage
{
    public static function url(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        return url('/storage/'.ltrim($path, '/'));
    }
}
