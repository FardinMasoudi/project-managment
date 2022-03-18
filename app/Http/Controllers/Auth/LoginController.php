<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function __invoke(LoginRequest $request)
    {
        if (!Auth::attempt($request->all())) {
            return $this->responseError('authentication faild');
        }

        $user = $this->userRepository->getUserByEmail($request->email);

        return $this->responseOk([
            'access_token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }
}
