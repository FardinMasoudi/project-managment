<?php

namespace App\Repositories;

use App\Http\Requests\ProjectRequest;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAllProject()
    {
        return Project::all();
    }

    public function getOwnProjects()
    {
        return Project::with('creator')
            ->where('creator_id', auth()->user()->id)
            ->get();
    }

    public function getProjectById($id)
    {
        return Project::query()->findOrFail($id);
    }

    public function createProject(ProjectRequest $request)
    {
        return Project::query()->create([
            'creator_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => Carbon::now()->format('Y-m-d')
        ]);
    }

    public function updateProject(Project $project, ProjectRequest $request)
    {
        return $project->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }
}
