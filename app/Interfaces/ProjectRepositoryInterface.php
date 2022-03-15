<?php

namespace App\Interfaces;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

interface ProjectRepositoryInterface
{
    public function getAllProject();

    public function getOwnProjects();

    public function getProjectById($id);

    public function createProject(Request $request);

    public function updateProject($projectId, Request $request);
}
