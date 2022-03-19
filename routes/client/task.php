<?php

use App\Http\Controllers\Api\V1\Client\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('/tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])
        ->name('client-tasks-index');

    Route::get('/{id}', [TaskController::class, 'show'])
        ->name('client-tasks-show');

    Route::post('/', [TaskController::class, 'store'])
        ->middleware('hasPermission:create-task')
        ->name('client-tasks-store');

    Route::patch('/{id}', [TaskController::class, 'update'])
        ->middleware('hasPermission:update-task')
        ->name('client-tasks-update');

    Route::delete('/{id}', [TaskController::class, 'delete'])
        ->middleware('hasPermission:remove-task')
        ->name('client-tasks-delete');
});
