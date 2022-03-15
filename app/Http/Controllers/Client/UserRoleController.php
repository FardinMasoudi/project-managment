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
        DB::table('user_project_role')->insert([
            'member_id' => $user->id,
            'role_id' => $request->role_id,
            'project_id' => auth()->user()->currentProject()->id
        ]);

        return $this->responseOk();
    }
}
