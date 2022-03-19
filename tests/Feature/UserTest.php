<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $this->getJson(route('client-users-show'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email'
                ]
            ]);
    }

    public function test_the_user_can_update_own_information()
    {
        $this->patchJson(route('client-users-update'), [
            'name' => 'fardin',
            'email' => 'abc@gmail.com'
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('users', [
            'name' => 'fardin'
        ]);
    }

}
