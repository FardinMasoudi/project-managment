<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use App\Models\Project;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getAllPermission()
    {
        return $this->permission->all();
    }

    public function createPermission($data)
    {
        return $this->permission->create([
            'title' => $data['title'],
            'label' => $data['label'],
        ]);
    }
}
