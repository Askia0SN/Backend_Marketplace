<?php

namespace App\Support;

final class PublicStorage
{
    public static function url(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        $request = request();
        $scheme = explode(',', $request->headers->get('x-forwarded-proto', $request->getScheme()))[0];
        $host = explode(',', $request->headers->get('x-forwarded-host', $request->getHost()))[0];

        return trim($scheme).'://'.trim($host).'/storage/'.ltrim($path, '/');
    }
}
