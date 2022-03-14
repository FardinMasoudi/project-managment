<?php

namespace App\Interfaces;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

interface ProjectRepositoryInterface
{
    public function getAllProjects();

    public function getOwnProjects();

    public function getProjectById($id);

    public function createProject(ProjectRequest $request);

    public function updateProject(Project $project, ProjectRequest $request);
}
