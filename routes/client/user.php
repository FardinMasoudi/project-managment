<?php

use App\Http\Controllers\Api\V1\Client\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'show'])
        ->name('client-users-show');

    Route::patch('/', [UserController::class, 'update'])
        ->name('client-users-update');
});
