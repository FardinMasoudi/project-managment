<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use App\Models\Project;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permissions;

    public function __construct(Permission $permission)
    {
        $this->permissions = $permission;
    }

    public function getAllPermission()
    {
        return $this->permissions->all();
    }

    public function createPermission($data)
    {
        return $this->permissions->create([
            'title' => $data['title'],
            'label' => $data['label'],
        ]);
    }
}
