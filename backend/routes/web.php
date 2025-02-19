<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsentementController;

Route::apiResource('users', UserController::class);
Route::apiResource('consentements', ConsentementController::class);
Route::apiResource('consentements', ConsentementController::class)
    ->only(['store', 'show', 'update', 'destroy']);