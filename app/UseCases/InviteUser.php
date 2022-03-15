<?php

namespace App\UseCases;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class InviteUser
{
    private $userRepository;
    private $user;
    private $request;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($request)
    {
        $this->request = $request;

        $this->findOrCreateUser()
            ->addUserToProject()
            ->sendEmailToUser();
    }

    public function findOrCreateUser()
    {
        $this->user = $this->userRepository->getUserByEmail($this->request->email);

        if (!$this->user) {
            $this->addUser();
        }
        return $this;
    }

    public function addUserToProject()
    {
        DB::table('project_member')->insert([
            'project_id' => auth()->user()->currentProject()->id,
            'member_id' => $this->user->id,
            'is_active' => true
        ]);

        return $this;
    }

    public function sendEmailToUser()
    {
        return $this;
    }

    public function addUser()
    {
        $this->user = $this->userRepository->createUser($this->request);
    }
}
