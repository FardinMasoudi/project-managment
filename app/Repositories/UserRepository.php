<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    protected $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }

    public function getAllUsers()
    {
        return $this->users->all();
    }

    public function getUserById($id)
    {
        return $this->users->findOrFail($id);
    }

    public function getUserByEmail($email)
    {
        return $this->users->whereEmail($email)->first();
    }

    public function createUser($request)
    {
        return $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    public function updateUser($id, $request)
    {
        return $this->users->where('id', $id)->first()
            ->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
    }
}
