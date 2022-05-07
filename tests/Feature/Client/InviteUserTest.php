<?php

namespace Tests\Feature\Client;

use App\Mail\WelcomeInvitationMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InviteUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_the_owner_project_can_invite_members_by_email()
    {
        Mail::fake();

        $this->GivenAccessToUser('invite-user');

        $this->postJson(route('client-invite-user', [
            'email' => 'abc@gmail.com',
            'password' => '123456'
        ]))
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('project_member', [
            'project_id' => auth()->user()->currentProject()->id,
            'member_id' => User::where('email', 'abc@gmail.com')->first()->id
        ]);

        Mail::assertSent(WelcomeInvitationMail::class);
    }
}
