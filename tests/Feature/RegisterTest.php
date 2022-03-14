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
            ->assertJson(['code' => 200]);
    }
}
