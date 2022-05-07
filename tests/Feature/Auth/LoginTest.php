<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function route;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_field_is_required()
    {

        $this->postJson(route('login'), [
            'password' => '123456'
        ])
            ->assertJsonStructure(['errors' => [
                'email' => [

                ]
            ]]);
    }

    public function test_password_field_is_required()
    {
        $this->postJson(route('login'), [
            'email' => 'abc@gmail.com'
        ])
            ->assertJsonStructure(['errors' => [
                'password' => [

                ]
            ]]);
    }

    public function test_user_can_loggedin_with_correct_info()
    {
        $this->create(User::class, [
            'email' => 'abc@gmail.com',
            'password' => '123456'
        ]);

        $this->postJson(route('login'), [
            'email' => 'abc@gmail.com',
            'password' => '123456'
        ])->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                'access_token'
            ]]);
    }
}
