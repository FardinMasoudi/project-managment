<?php

namespace Tests\Feature\Client;

use App\Models\Sprint;
use Carbon\Carbon;
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
        $this->create(Sprint::class, [
            'project_id' => auth()->user()->currentProject()->id
        ], 2);

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

    public function test_client_can_see_details_of_sprint()
    {
        $sprint = $this->create(Sprint::class, [
            'project_id' => auth()->user()->currentProject()->id
        ]);

        $this->getJson(route('client-sprints-show', [$sprint]))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                'id',
                'goal',
                'start_time',
                'end_time',
                'status'
            ]]);
    }

    public function test_client_can_create_new_sprint()
    {
        $this->postJson(route('client-sprints-store'), [
            'goal' => 'test',
        ])->assertJson(['code' => 200]);

        $this->assertDatabaseHas('sprints', [
            'goal' => 'test'
        ]);
    }

    public function test_cluent_can_update_sprint()
    {
        $sprint = $this->create(Sprint::class, [
            'goal' => 'test',
            'end_time' => Carbon::now()->addWeek()
        ]);
        $this->patchJson(route('client-sprints-update', [$sprint]), [
            'goal' => 'goal update',
            'end_time' => Carbon::now()->addWeeks(2)
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('sprints', [
            'goal' => 'goal update'
        ]);
    }
}
