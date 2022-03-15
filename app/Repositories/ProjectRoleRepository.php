<?php

namespace App\Repositories;

use App\Interfaces\ProjectRoleRepositoryInterface;
use App\Models\ProjectRole;

class ProjectRoleRepository implements ProjectRoleRepositoryInterface
{
    public $projectRole;
    public $currentProjectId;

    public function __construct(ProjectRole $projectRole)
    {
        $this->projectRole = $projectRole;
        $this->currentProjectId = auth()->user()->currentProject()->id;
    }

    public function getAllProjectRoles()
    {
        return $this->projectRole->where('project_id', $this->currentProjectId)
            ->get();
    }

    public function storeProjectRole($request)
    {
        return $this->projectRole->create([
            'project_id' => $this->currentProjectId,
            'title' => $request->title
        ]);
    }

    public function updateProjectRole($id, $request)
    {
        return $this->projectRole->where('id', $id)->first()
            ->update([
                'title' => $request->title
            ]);
    }

    public function deleteProjectRole($id)
    {
        return $this->projectRole->where('id', $id)->first()
            ->delete();
    }
}
