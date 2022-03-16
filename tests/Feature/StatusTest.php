<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_seed_statuses()
    {
        $this->artisan("db:seed --class=StatusSeeder");

        $this->assertDatabaseHas('statuses', [
            'title' => 'active'
        ]);
    }

}
