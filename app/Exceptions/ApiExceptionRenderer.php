<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

// Minden API hiba ugyanilyen alakú: {"error": {"status": 404, "message": "...", "errors": {...}}}

class ApiExceptionRenderer
{
    public function __invoke(Throwable $e, Request $request): ?JsonResponse
    {
        if (! $request->is('api/*')) {
            return null;
        }

        $error = ['status' => 500];

        if ($e instanceof ValidationException) {
            $error['status'] = 422;
            $error['errors'] = $e->errors();
        } elseif ($e instanceof HttpExceptionInterface) {
            $error['status'] = $e->getStatusCode();
        }

        $error['message'] = Response::$statusTexts[$error['status']];

        return response()->json(['error' => $error], $error['status']);
    }
}
