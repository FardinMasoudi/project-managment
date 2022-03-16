<?php

namespace Tests\Feature\Client;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_client_can_see_list_of_tasks()
    {
        $this->create(Task::class, [
            'project_id' => auth()->user()->currentProject()->id
        ], 2);

        $this->getJson(route('client-tasks-index'))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                [
                    'id',
                    'reporter',
                    'assign_to',
                    'title',
                    'status',
                    'deadline_time',
                ]
            ]]);
    }
}
