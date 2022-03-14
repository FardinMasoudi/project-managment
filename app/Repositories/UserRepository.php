<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::query()->findOrFail($id);
    }

    public function getUserByEmail($email)
    {
        return User::query()->whereEmail($email)->first();
    }

    public function createUser(Request $request)
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    public function updateUser(User $user, Request $request)
    {
        return $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function deleteUser()
    {

    }
}
