<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocsBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $valid = hash_equals(config('docs.username'), (string) $request->getUser())
            & hash_equals(config('docs.password'), (string) $request->getPassword());

        if (! $valid) {
            return response('Unauthorized', Response::HTTP_UNAUTHORIZED, [
                'WWW-Authenticate' => 'Basic realm="API documentation"',
            ]);
        }

        return $next($request);
    }
}
