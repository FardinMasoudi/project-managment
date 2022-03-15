<?php

namespace Tests\Feature\Client;

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
    }

    public function test_owner_project_can_see_list_of_project_roles()
    {
        $this->create(ProjectRole::class);

        $this->getJson(route('client-project-roles.index'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                [
                    'id',
                    'title'
                ]
            ]]);
    }
}
