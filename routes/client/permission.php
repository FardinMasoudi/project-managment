<?php

use App\Http\Controllers\Api\V1\Client\PermissionController;
use Illuminate\Support\Facades\Route;

Route::post('/permissions', PermissionController::class)
    ->name('client-permissions');
