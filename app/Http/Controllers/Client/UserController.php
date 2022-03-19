<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;


class UserController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $reository)
    {
        $this->userRepository = $reository;
    }

    public function show()
    {
        return $this->responseOk(UserResource::make(auth()->user()));
    }

    public function update(UpdateUserRequest $request)
    {
        $this->userRepository->updateUser(auth()->user()->id, $request);

        return $this->responseOk();
    }
}
