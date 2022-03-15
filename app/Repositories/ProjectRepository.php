<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Carbon\Carbon;

class ProjectRepository implements ProjectRepositoryInterface
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getAllProject()
    {
        return $this->project->all();
    }

    public function getOwnProjects()
    {
        return $this->project->with('creator')
            ->where('creator_id', auth()->user()->id)
            ->get();
    }

    public function getProjectById($id)
    {
        return $this->project->query()->findOrFail($id);
    }

    public function createProject($request)
    {
        return $this->project->create([
            'creator_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => Carbon::now()->format('Y-m-d')
        ]);
    }

    public function updateProject($projectId, $request)
    {
        return $this->project->where('id', $projectId)->first()
            ->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    }
}
