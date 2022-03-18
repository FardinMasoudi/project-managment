<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getAllUsers();

    public function getUserById($id);

    public function getUserByEmail($email);

    public function createUser($request);

    public function updateUser(User $user, Request $request);

    public function deleteUser();
}
