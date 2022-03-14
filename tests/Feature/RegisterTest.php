<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;


    public function test_name_is_required()
    {
        $this->postJson(route('register'), [

        ])
            ->assertJsonStructure(['errors' => [
                'name' => [

                ]
            ]]);
    }


    public function test_email_is_required()
    {
        $this->postJson(route('register'), [
            'name' => 'fardin',
        ])
            ->assertJsonStructure(['errors' => [
                'email' => [

                ]
            ]]);
    }

    public function test_email_should_be_valid()
    {
        $this->postJson(route('register'), [
            'name' => 'fardin',
            'email' => '70gmail.com'
        ])
            ->assertJsonStructure(['errors' => [
                'email' => [
                    [

                    ]
                ]
            ]]);

    }

    public function test_password_filed_is_required()
    {
        $this->postJson(route('register'), [
            'name' => 'fardin',
            'email' => 'abc@gmail.com'
        ])
            ->assertJsonStructure(['errors' => [
                'password' => [
                    [

                    ]
                ]
            ]]);
    }

    public function test_password_filed_must_be_confirmed()
    {
        $this->postJson(route('register'), [
            'name' => 'fardin',
            'email' => 'abc@gmail.com',
            'password' => '123456'
        ])
            ->assertJsonStructure(['errors' => [
                'password' => [

                ]
            ]]);
    }

    public function test_user_can_register()
    {
        $this->postJson(route('register'), [
            'name' => 'fardin',
            'email' => 'abc@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456'
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('users', [
            'name' => 'fardin'
        ]);
    }
}
