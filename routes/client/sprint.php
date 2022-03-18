<?php

use App\Http\Controllers\Client\SprintController;
use Illuminate\Support\Facades\Route;

Route::prefix('/sprints')->group(function () {
    Route::get('/', [SprintController::class, 'index'])
        ->middleware('hasPermission:view-sprint')
        ->name('client-sprints-index');

    Route::get('/{id}', [SprintController::class, 'show'])
        ->middleware('hasPermission:show-sprint')
        ->name('client-sprints-show');

    Route::post('/', [SprintController::class, 'store'])
        ->middleware('hasPermission:create-sprint')
        ->name('client-sprints-store');

    Route::patch('/{id}', [SprintController::class, 'update'])
        ->middleware('hasPermission:update-sprint')
        ->name('client-sprints-update');
});
