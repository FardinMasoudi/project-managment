<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_title_filed_is_required()
    {
        $this->postJson(route('projects.store'), [
            'description' => 'project description'
        ])->assertJsonStructure(['errors' => [
            'title' => [
                [

                ]
            ]
        ]]);
    }

    public function test_description_filed_is_required()
    {
        $this->postJson(route('projects.store'), [
            'title' => 'title'
        ])->assertJsonStructure(['errors' => [
            'description' => [
                [

                ]
            ]
        ]]);
    }

    public function test_the_user_can_see_list_of_own_projects()
    {
        $this->create(Project::class, [
            'creator_id' => auth()->user()->id
        ], 2);

        $this->getJson(route('projects.index'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                [
                    'id',
                    'creator',
                    'title',
                    'description',
                    'start_time',
                    'end_time',
                ]
            ]]);
    }

    public function test_the_loggedin_user_caan_see_details_of_own_project()
    {
        $project = $this->create(Project::class, [
            'title' => 'test',
            'creator_id' => auth()->user()->id
        ]);

        $this->getJson(route('projects.show', [$project]))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                'id',
                'title',
                'description',
                'start_time',
                'end_time',
            ]]);
    }

    public function test_the_loggedin_user_can_make_new_project()
    {
        $this->postJson(route('projects.store'), [
            'title' => 'project-managment',
            'description' => $this->faker->text
        ])->assertJson(['code' => 200]);

        $this->assertDatabaseHas('projects', [
            'title' => 'project-managment'
        ]);
    }

    public function test_the_loggedin_user_can_update_own_projects()
    {
        $this->GivenAccessToUser('update-project');
        $project = $this->create(Project::class, [
            'title' => 'test',
            'creator_id' => auth()->user()->id
        ]);

        $this->patchJson(route('projects.update', [$project]), [
            'title' => 'project-management',
            'description' => 'description of projects'
        ])->assertJson(['code' => 200]);


        $this->assertDatabaseMissing('projects', [
            'title' => 'test'
        ]);
    }
}
