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
    include 'client/project.php';
    include 'client/project-role.php';
    include 'client/sprint.php';
    include 'client/task.php';
    include 'client/user-role.php';
    include 'client/permission.php';
    include 'client/invite-member.php';
});
