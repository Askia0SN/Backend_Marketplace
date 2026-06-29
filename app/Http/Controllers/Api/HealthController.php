<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $database = 'ok';

        try {
            DB::select('select 1');
        } catch (Throwable) {
            $database = 'unavailable';
        }

        $healthy = $database === 'ok';

        return response()->json([
            'status' => $healthy ? 'ok' : 'degraded',
            'service' => 'epf-marketplace-api',
            'environment' => app()->environment(),
            'checks' => [
                'database' => $database,
            ],
            'timestamp' => now()->toIso8601String(),
        ], $healthy ? 200 : 503);
    }
}
