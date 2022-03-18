<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends ApiController
{
    public function __invoke(RegisterRequest $request, UserRepositoryInterface $userRepository): JsonResponse
    {
        $userRepository->createUser($request);

        return $this->responseOk();
    }
}
