<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\ProjectController;
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


});
