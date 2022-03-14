<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends ApiController
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $user = $this->userRepository->createUser($request);

        $user = $this->userRepository->getUserByEmail($request->email);

        return $this->responseOk([
            'access_token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }
}
