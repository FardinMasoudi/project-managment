<?php

namespace Tests\Feature\Client;

use App\Models\Sprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SprintTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_cliet_can_see_list_of_sprints()
    {
        $this->create(Sprint::class);

        $this->getJson(route('client-sprints-index'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                [
                    'id',
                    'goal',
                    'start_time',
                    'end_time',
                    'status',
                ]
            ]]);

    }
}
