<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectController extends ApiController
{
    private ProjectRepositoryInterface $projectRepository;

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

    public function show(Project $project)
    {
        $project = $this->projectRepository
            ->getProjectById($project->id);

        return $this->responseOk(ProjectResource::make($project));
    }

    public function store(ProjectRequest $request)
    {
        $this->projectRepository
            ->createProject($request);

        return $this->responseOk();
    }

    public function update(Project $project, ProjectRequest $request)
    {
        $this->projectRepository
            ->updateProject($project, $request);

        return $this->responseOk();
    }


}
