<?php

use App\Http\Controllers\Api\V1\Client\InviteUserController;
use Illuminate\Support\Facades\Route;

Route::post('/invite-member', InviteUserController::class)
    ->middleware('hasPermission:invite-user')
    ->name('client-invite-user');
