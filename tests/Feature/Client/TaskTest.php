<?php

namespace Tests\Feature\Client;

use App\Models\Sprint;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
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

    public function test_client_filter_tasks_by_status()
    {
        $this->create(Task::class, [
            'status_id' => Status::getStatusIdByTitle('todo')
        ], 2);
        $this->create(Task::class, [
            'status_id' => Status::getStatusIdByTitle('doing')
        ]);

        $this->getJson(route('client-tasks-index') . "?status=todo")
            ->assertJson(['code' => 200, 'data' => [
                [
                    'status' => 'todo'
                ]]])
            ->assertJsonMissing(['data' => [
                [
                    'status' => 'doing'
                ]
            ]]);
    }

    public function test_client_filter_only_issues()
    {
        $this->create(Task::class, [
            'status_id' => Status::getStatusIdByTitle('todo'),
            'assign_to' => auth()->user()->id
        ], 2);

        $this->create(Task::class, [
            'status_id' => Status::getStatusIdByTitle('doing'),
            'assign_to' => $this->create(User::class)->id
        ]);

        $this->getJson(route('client-tasks-index') . "?status=todo&onlyMyIssues")
            ->assertJson(['code' => 200, 'data' => [
                [
                    'status' => 'todo',
                    'assign_to' => auth()->user()->name
                ]]])
            ->assertJsonMissing(['data' => [
                [
                    'status' => 'doing'
                ]
            ]]);
    }

    public function test_the_client_can_see_details_of_task()
    {
        $task = $this->create(Task::class, [
            'project_id' => auth()->user()->currentProject()->id
        ]);

        $this->getJson(route('client-tasks-show', [$task]))
            ->assertJson(['code' => 200])
            ->assertJsonStructure(['data' => [
                'id',
                'reporter',
                'assign_to',
                'title',
                'status',
                'deadline_time',
            ]]);
    }

    public function test_client_can_make_new_test()
    {
        $user = $this->create(User::class);
        $sprint = $this->create(Sprint::class);

        $this->postJson(route('client-tasks-store'), [
            'title' => 'write project-managemnt for snapp!!',
            'description' => 'description of project',
            'assign_to' => $user->id,
            'type' => 'task',
            'deadline_time' => Carbon::now()->addWeek(),
            'sprint_id' => $sprint->id
        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'write project-managemnt for snapp!!'
        ]);
    }

    public function test_the_client_can_update_task()
    {
        $member1 = $this->create(User::class);
        $member2 = $this->create(User::class);
        $task = $this->create(Task::class, [
            'title' => 'task title',
            'assign_to' => $member1
        ]);
        $sprint = $this->create(Sprint::class);
        $this->patchJson(route('client-tasks-update', [$task]), [
            'title' => 'update task',
            'description' => 'description of task',
            'sprint_id' => $sprint->id,
            'assign_to' => $member2->id,
            'type' => 'task'

        ])
            ->assertJson(['code' => 200]);

        $this->assertDatabaseMissing('tasks', [
            'assign_to' => $member1->id
        ]);
    }

    public function test_the_client_can_remove_task()
    {
        $task = $this->create(Task::class);

        $this->deleteJson(route('client-tasks-delete', [$task]))->assertJson(['code' => 200]);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id
        ]);
    }
}
