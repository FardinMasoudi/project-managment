<?php

namespace App\Observers;

use App\Models\ProjectRole;
use Illuminate\Http\Request;

class ProjectRoleObserver
{
    /**
     * Handle the ProjectRole "created" event.
     *
     * @param \App\Models\ProjectRole $projectRole
     * @return void
     */
    public function created(ProjectRole $projectRole)
    {
        $projectRole->permissions()->attach(\request('permissions'));
    }

    /**
     * Handle the ProjectRole "updated" event.
     *
     * @param \App\Models\ProjectRole $projectRole
     * @return void
     */
    public function updated(ProjectRole $projectRole)
    {
        $projectRole->permissions()->sync(\request('permissions'));
    }

    /**
     * Handle the ProjectRole "deleted" event.
     *
     * @param \App\Models\ProjectRole $projectRole
     * @return void
     */
    public function deleted(ProjectRole $projectRole)
    {
        //
    }

    /**
     * Handle the ProjectRole "restored" event.
     *
     * @param \App\Models\ProjectRole $projectRole
     * @return void
     */
    public function restored(ProjectRole $projectRole)
    {
        //
    }

    /**
     * Handle the ProjectRole "force deleted" event.
     *
     * @param \App\Models\ProjectRole $projectRole
     * @return void
     */
    public function forceDeleted(ProjectRole $projectRole)
    {
        //
    }
}
