<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectRoleRequest;
use App\Http\Resources\ProjectRoleResource;
use App\Interfaces\ProjectRoleRepositoryInterface;
use App\Models\Project;
use App\Models\ProjectRole;


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

    public function store(ProjectRoleRequest $request)
    {
        $this->projectRoleRepository->storeProjectRole($request);

        return $this->responseOk();
    }

    public function update(ProjectRole $projectRole, ProjectRoleRequest $request)
    {
        $this->projectRoleRepository->updateProjectRole($projectRole->id, $request);

        return $this->responseOk();
    }

    public function destroy(ProjectRole $projectRole)
    {
        $this->projectRoleRepository->deleteProjectRole($projectRole->id);

        return $this->responseOk();
    }
}
