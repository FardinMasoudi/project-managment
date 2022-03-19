<?php

use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'show'])
        ->name('client-users-show');

    Route::patch('/}', [UserController::class, 'update'])
        ->name('client-users-update');
});
