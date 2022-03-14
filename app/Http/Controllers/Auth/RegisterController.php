<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private UserRepositoryInterface $repository;

    public function __invoke(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(RegisterRequest $request)
    {
        $this->repository->createUser($request);
    }
}
