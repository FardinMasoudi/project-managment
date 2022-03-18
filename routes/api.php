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
use App\Models\Sprint;
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

        Route::patch('/{id}', [ProjectController::class, 'update'])
            ->middleware('hasPermission:update-project')
            ->name('projects.update');
    });

    Route::post('/invite-member', InviteUserController::class)
        ->middleware('hasPermission:invite-user')
        ->name('client-invite-user');

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

    Route::post('/permissions', PermissionController::class)
        ->name('client-permissions');

    Route::patch('users/{user}/attach-roles', [UserRoleController::class, 'update'])
        ->name('client-user-attach-role');


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
});
