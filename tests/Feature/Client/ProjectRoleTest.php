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
        $this->postJson(route('client-project-roles.store'), [
            'title' => 'project-manager'
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('project_roles', [
            'title' => 'project-manager'
        ]);
    }

    public function test_client_can_update_project_role()
    {
        $projectRole = $this->create(ProjectRole::class, [
            'title' => 'admin'
        ]);

        $this->patchJson(route('client-project-roles.update', [$projectRole->id]), [
            'title' => 'reporter'
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseMissing('project_roles', [
            'title' => 'admin'
        ]);
    }

    public function test_client_can_delete_project_role()
    {
        $projectRole = $this->create(ProjectRole::class, [
            'title' => 'admin'
        ]);

        $this->deleteJson(route('client-project-roles.delete', [$projectRole]))
            ->assertJson(['code' => 200]);

        $this->assertDatabaseMissing('project_roles', [
            'id' => $projectRole->id
        ]);
    }
}
