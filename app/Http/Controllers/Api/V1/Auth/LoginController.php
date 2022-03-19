<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiController
{
    public function __invoke(LoginRequest $request, UserRepositoryInterface $userRepository)
    {
        if (!Auth::attempt($request->all())) {
            return $this->responseError('authentication faild');
        }

        $user = $userRepository->getUserByEmail($request->email);

        return $this->responseOk([
            'access_token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }
}
