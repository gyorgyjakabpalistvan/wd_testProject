<?php

namespace App\Http\Middleware;

use App\Models\ApiLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Globális middleware, hogy a 404/405 válaszok is bekerüljenek a logba.
class LogApiTraffic
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        if (! $request->is('api/*')) {
            return;
        }

        ApiLog::create([
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'request_body' => $request->getContent(),
            'response_status' => $response->getStatusCode(),
            'response_body' => $response->getContent(),
        ]);
    }
}
