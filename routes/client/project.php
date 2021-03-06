<?php

use App\Http\Controllers\Api\V1\Client\ProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('/projects')->group(function () {

    Route::get('/', [ProjectController::class, 'index'])
        ->name('projects.index');

    Route::get('/{id}', [ProjectController::class, 'show'])
        ->name('projects.show');

    Route::post('/', [ProjectController::class, 'store'])
        ->name('projects.store');

    Route::patch('/{id}', [ProjectController::class, 'update'])
        ->middleware('hasPermission:update-project')
        ->name('projects.update');
});
