<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
    }

    public function test_the_user_can_see_own_profile()
    {
        $user = $this->create(User::class);

        $this->postJson(route('users.show', [$user]))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                'name',
                'email'
            ]]);
    }

    public function test_the_user_can_update_own_information()
    {
        $this->postJson(route('users.update'), [
            'name' => 'title'
        ])
            ->assertJson(['code' => 200]);
    }

}
