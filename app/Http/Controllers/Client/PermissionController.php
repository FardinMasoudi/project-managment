<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Resources\PermissionResource;
use App\Interfaces\PermissionRepositoryInterface;

class PermissionController extends ApiController
{
    public $permission;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permission = $permissionRepository;
    }

    public function __invoke()
    {
        $permissions = $this->permission->getAllPermission();

        return $this->responseOk(PermissionResource::collection($permissions));
    }
}
