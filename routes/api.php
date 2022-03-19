<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
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

Route::prefix('/v1/client')->group(function () {
    Route::post('register', RegisterController::class)
        ->name('register');

    Route::post('login', LoginController::class)
        ->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        include 'client/project.php';
        include 'client/project-role.php';
        include 'client/sprint.php';
        include 'client/task.php';
        include 'client/user.php';
        include 'client/user-role.php';
        include 'client/permission.php';
        include 'client/invite-member.php';
    });
});
