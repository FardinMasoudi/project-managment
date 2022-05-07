<?php

use App\Http\Controllers\Api\V1\Client\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::patch('users/{user}/attach-roles', [UserRoleController::class, 'update'])
    ->middleware('hasPermission:attach-role')
    ->name('client-user-attach-role');
