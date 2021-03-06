<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectController extends ApiController
{
    private  $projectRepository;

    public function __construct(ProjectRepositoryInterface $repository)
    {
        $this->projectRepository = $repository;
    }

    public function index()
    {
        $projects = $this->projectRepository
            ->getOwnProjects();

        return $this->responseOk(ProjectResource::collection($projects));
    }

    public function show($id)
    {
        $project = $this->projectRepository
            ->getProjectById($id);

        return $this->responseOk(ProjectResource::make($project));
    }

    public function store(ProjectRequest $request)
    {
        $this->projectRepository
            ->createProject($request);

        return $this->responseOk();
    }

    public function update($id, ProjectRequest $request)
    {
        $this->projectRepository
            ->updateProject($id, $request);

        return $this->responseOk();
    }


}
