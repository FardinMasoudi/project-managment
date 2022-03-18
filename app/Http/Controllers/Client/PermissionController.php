<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Resources\PermissionResource;
use App\Interfaces\PermissionRepositoryInterface;

class PermissionController extends ApiController
{
    public $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function __invoke()
    {
        $permissions = $this->permissionRepository->getAllPermission();

        return $this->responseOk(PermissionResource::collection($permissions));
    }
}
