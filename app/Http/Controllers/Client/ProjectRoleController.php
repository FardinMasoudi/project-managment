<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ProjectRoleResource;
use App\Interfaces\ProjectRoleRepositoryInterface;


class ProjectRoleController extends ApiController
{
    private $projectRoleRepository;

    public function __construct(ProjectRoleRepositoryInterface $repository)
    {
        $this->projectRoleRepository = $repository;
    }

    public function index()
    {
        $projectRoles = $this->projectRoleRepository->getAllProjectRoles();

        return $this->responseOk(ProjectRoleResource::collection($projectRoles));
    }
}
