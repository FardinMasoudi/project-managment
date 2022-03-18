<?php

namespace Tests;

use App\Models\Permission;
use App\Models\Project;
use App\Models\ProjectRole;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create($model, array $overrides = [], $count = 1)
    {
        return $model::factory()->count($count > 1 ? $count : null)->create($overrides);
    }

    public function signIn($user = null)
    {
        $user = $user ?? User::factory()->create();

        $this->actingAs($user);
    }

    public function GivenAccessToUser($permission)
    {
        $currentProjectId = auth()->user()->currentProject()->id;

        $role = $this->create(ProjectRole::class, [
            'project_id' => $currentProjectId
        ]);

        $permissionId = Permission::getPermissionIdByTitle($permission);

        $role->permissions()->attach($permissionId);

        auth()->user()->roles()->attach([
            'project_id' => $currentProjectId,
            'role_id' => $role->id
        ]);
    }

    public function prepareData()
    {
        $this->artisan('db:seed');

        $project1 = $this->create(Project::class, []);
        $project2 = $this->create(Project::class, []);

        DB::table('project_member')
            ->insert([
                [
                    'project_id' => $project1->id,
                    'member_id' => auth()->user()->id,
                    'is_active' => true
                ], [
                    'project_id' => $project2->id,
                    'member_id' => auth()->user()->id,
                    'is_active' => false
                ]
            ]);
    }
}
