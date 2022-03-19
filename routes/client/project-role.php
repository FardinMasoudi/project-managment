<?php

use App\Http\Controllers\Api\V1\Client\ProjectRoleController;
use Illuminate\Support\Facades\Route;


Route::prefix('/project-roles')->group(function () {

    Route::get('/', [ProjectRoleController::class, 'index'])
        ->middleware('hasPermission:view-role')
        ->name('client-project-roles.index');

    Route::post('/', [ProjectRoleController::class, 'store'])
        ->middleware('hasPermission:create-role')
        ->name('client-project-roles.store');

    Route::patch('/{projectRole}', [ProjectRoleController::class, 'update'])
        ->middleware('hasPermission:update-role')
        ->name('client-project-roles.update');

    Route::delete('/{projectRole}', [ProjectRoleController::class, 'destroy'])
        ->middleware('hasPermission:remove-role')
        ->name('client-project-roles.delete');
});
