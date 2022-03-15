<?php

namespace Tests\Feature\Client;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class InviteUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
    }

    public function test_the_owner_project_can_invite_members_by_email()
    {
        $project1 = $this->create(Project::class);
        $project2 = $this->create(Project::class);

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

        $this->postJson(route('client-invite-user', [
            'email' => 'abc@gmail.com',
            'password' => '123456'
        ]))
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('project_member', [
            'project_id' => $project1->id,
            'member_id' => User::where('email', 'abc@gmail.com')->first()->id
        ]);
    }
}
