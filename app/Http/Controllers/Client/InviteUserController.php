<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\InviteUserRequest;
use Facades\App\UseCases\InviteUser;


class InviteUserController extends ApiController
{
    public function __invoke(InviteUserRequest $request)
    {
        InviteUser::handle($request);

        return $this->responseOk([
            'invited_member' => $request->email
        ]);
    }
}
