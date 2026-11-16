<?php

use App\Exceptions\ApiExceptionRenderer;
use App\Http\Middleware\DocsBasicAuth;
use App\Http\Middleware\LogApiTraffic;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(LogApiTraffic::class);
        $middleware->alias(['docs.auth' => DocsBasicAuth::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(fn ($request) => $request->is('api/*'));
        $exceptions->render(new ApiExceptionRenderer());
    })->create();
