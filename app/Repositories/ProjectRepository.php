<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Carbon\Carbon;

class ProjectRepository implements ProjectRepositoryInterface
{
    protected $projects;

    public function __construct(Project $project)
    {
        $this->projects = $project;
    }

    public function getAllProject()
    {
        return $this->projects->all();
    }

    public function getOwnProjects()
    {
        return $this->projects->with('creator')
            ->where('creator_id', auth()->user()->id)
            ->get();
    }

    public function getProjectById($id)
    {
        return $this->projects->query()->findOrFail($id);
    }

    public function createProject($request)
    {
        return $this->projects->create([
            'creator_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => Carbon::now()->format('Y-m-d')
        ]);
    }

    public function updateProject($projectId, $request)
    {
        return $this->projects->where('id', $projectId)->first()
            ->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    }
}
