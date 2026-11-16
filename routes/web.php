<?php

use Illuminate\Support\Facades\Route;

Route::middleware('docs.auth')->prefix('docs')->group(function () {
    Route::view('/', 'docs');
    Route::get('openapi.yaml', fn () => response()->file(base_path('openapi.yaml'), ['Content-Type' => 'application/yaml']));
});
