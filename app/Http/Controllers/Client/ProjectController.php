<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Interfaces\ProjectRepositoryInterface;

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
}
