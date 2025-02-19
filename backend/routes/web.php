<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsentementController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('consentements', ConsentementController::class);
