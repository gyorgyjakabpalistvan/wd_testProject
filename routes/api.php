<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ContractAssetController;
use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::apiResource('assets', AssetController::class);
Route::apiResource('contracts', ContractController::class);

Route::post('contracts/{contract}/assets', [ContractAssetController::class, 'store']);
Route::delete('contracts/{contract}/assets/{asset}', [ContractAssetController::class, 'destroy']);
