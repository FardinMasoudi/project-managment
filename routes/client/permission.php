<?php

use App\Http\Controllers\Client\PermissionController;
use Illuminate\Support\Facades\Route;

Route::post('/permissions', PermissionController::class)
    ->name('client-permissions');
