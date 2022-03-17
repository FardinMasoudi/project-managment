<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\InviteUserController;
use App\Http\Controllers\Client\PermissionController;
use App\Http\Controllers\Client\ProjectController;
use App\Http\Controllers\Client\ProjectRoleController;
use App\Http\Controllers\Client\SprintController;
use App\Http\Controllers\Client\TaskController;
use App\Http\Controllers\Client\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', RegisterController::class)
    ->name('register');

Route::post('login', LoginController::class)
    ->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('/projects')->group(function () {

        Route::get('/', [ProjectController::class, 'index'])
            ->name('projects.index');

        Route::get('/{project}', [ProjectController::class, 'show'])
            ->name('projects.show');

        Route::post('/', [ProjectController::class, 'store'])
            ->name('projects.store');

        Route::patch('/{project}', [ProjectController::class, 'update'])
            ->name('projects.update');
    });

    Route::post('/invite-member', InviteUserController::class)
        ->name('client-invite-user');

    Route::prefix('/project-roles')->group(function () {

        Route::get('/', [ProjectRoleController::class, 'index'])
            ->name('client-project-roles.index');

        Route::post('/', [ProjectRoleController::class, 'store'])
            ->name('client-project-roles.store');

        Route::patch('/{projectRole}', [ProjectRoleController::class, 'update'])
            ->name('client-project-roles.update');

        Route::delete('/{projectRole}', [ProjectRoleController::class, 'destroy'])
            ->name('client-project-roles.delete');
    });

    Route::post('/permissions', PermissionController::class)
        ->name('client-permissions');

    Route::patch('users/{user}/attach-roles', [UserRoleController::class, 'update'])
        ->name('client-user-attach-role');


    Route::prefix('/sprints')->group(function () {
        Route::get('/', [SprintController::class, 'index'])
            ->name('client-sprints-index');

        Route::get('/{id}', [SprintController::class, 'show'])
            ->name('client-sprints-show');

        Route::post('/', [SprintController::class, 'store'])
            ->name('client-sprints-store');

        Route::patch('/{id}', [SprintController::class, 'update'])
            ->name('client-sprints-update');
    });

    Route::prefix('/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])
            ->name('client-tasks-index');

        Route::get('/{id}', [TaskController::class, 'show'])
            ->name('client-tasks-show');

        Route::post('/', [TaskController::class, 'store'])
            ->name('client-tasks-store');

        Route::patch('/{id}', [TaskController::class, 'update'])
            ->name('client-tasks-update');

        Route::delete('/{id}', [TaskController::class, 'delete'])
            ->name('client-tasks-delete');
    });
});
