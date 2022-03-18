<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\ProjectRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_admin_can_attch_role_to_user()
    {
        $user = $this->create(User::class);
        $role = $this->create(ProjectRole::class, [
            'title' => 'developer'
        ]);

        $this->patchJson(route('client-user-attach-role', [$user]), [
            'role_id' => $role->id
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('user_role', [
            'role_id' => $role->id,
            'member_id' => $user->id
        ]);


    }
}
