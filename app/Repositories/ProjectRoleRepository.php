<?php

namespace App\Repositories;

use App\Interfaces\ProjectRoleRepositoryInterface;
use App\Models\ProjectRole;

class ProjectRoleRepository implements ProjectRoleRepositoryInterface
{
    protected $projectRoles;
    public $currentProjectId;

    public function __construct(ProjectRole $projectRole)
    {
        $this->projectRoles = $projectRole;
        $this->currentProjectId = auth()->user()->currentProject()->id;
    }

    public function getAllProjectRoles()
    {
        return $this->projectRoles->where('project_id', $this->currentProjectId)
            ->get();
    }

    public function storeProjectRole($request)
    {
        return $this->projectRoles->create([
            'project_id' => $this->currentProjectId,
            'title' => $request->title
        ]);
    }

    public function updateProjectRole($id, $request)
    {
        return $this->projectRoles->where('id', $id)->first()
            ->update([
                'title' => $request->title
            ]);
    }

    public function deleteProjectRole($id)
    {
        return $this->projectRoles->where('id', $id)->first()
            ->delete();
    }
}
