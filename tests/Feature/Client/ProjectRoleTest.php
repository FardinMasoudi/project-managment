<?php

namespace Tests\Feature\Client;

use App\Models\Project;
use App\Models\ProjectRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectRoleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_owner_project_can_see_list_of_project_roles()
    {
        $this->GivenAccessToUser('view-role');
        $this->create(ProjectRole::class, [
            'project_id' => Project::query()->first()->id
        ], 2);

        $this->getJson(route('client-project-roles.index'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                [
                    'id',
                    'title'
                ]
            ]]);
    }

    public function test_client_can_store_new_role_for_project()
    {
        $this->GivenAccessToUser('create-role');
        $this->postJson(route('client-project-roles.store'), [
            'title' => 'project-manager',
            'permissions' => [
                '1',
                '2'
            ]
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('project_roles', [
            'title' => 'project-manager'
        ]);
        $this->assertDatabaseHas('project_role_permission', [
            'role_id' => ProjectRole::where('title', 'project-manager')->first()->id,
            'permission_id' => 1
        ]);
    }

    public function test_client_can_update_project_role()
    {
        $this->GivenAccessToUser('update-role');
        $projectRole = $this->create(ProjectRole::class, [
            'title' => 'admin'
        ]);

        $this->patchJson(route('client-project-roles.update', [$projectRole->id]), [
            'title' => 'reporter',
            'permissions' => [
                '1',
                '2'
            ]
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseMissing('project_roles', [
            'title' => 'admin'
        ]);
        $this->assertDatabaseHas('project_role_permission', [
            'role_id' => ProjectRole::where('title', 'reporter')->first()->id,
            'permission_id' => 1
        ]);
    }

    public function test_client_can_delete_project_role()
    {
        $this->GivenAccessToUser('remove-role');
        $projectRole = $this->create(ProjectRole::class, [
            'title' => 'admin'
        ]);

        $this->deleteJson(route('client-project-roles.delete', [$projectRole]))
            ->assertJson(['code' => 200]);

        $this->assertDatabaseMissing('project_roles', [
            'id' => $projectRole->id,
        ]);
    }
}
