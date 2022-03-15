<?php

namespace Tests\Feature;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();

        $this->prepareData();
    }

    public function test_client_can_see_list_of_permissions()
    {
        $this->postJson(route('client-permissions'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                [
                    'title',
                    'label'
                ]
            ]]);
    }

}
