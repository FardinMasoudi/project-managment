<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRoleRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRoleController extends ApiController
{
    public function update(User $user, UserRoleRequest $request)
    {
       $user->roles()->attach([
           'role_id' => $request->role_id
       ]);

        return $this->responseOk();
    }
}
