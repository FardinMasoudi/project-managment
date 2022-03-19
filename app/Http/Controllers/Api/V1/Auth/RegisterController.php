<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class RegisterController extends ApiController
{
    public function __invoke(RegisterRequest $request, UserRepositoryInterface $userRepository): JsonResponse
    {
        $userRepository->createUser($request);

        return $this->responseOk();
    }
}
