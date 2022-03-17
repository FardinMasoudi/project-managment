<?php

namespace Tests\Feature\Command;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskExpireTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->signIn();
        $this->prepareData();
    }

    public function test_check_doing_tasks_is_expired()
    {
        $this->create(Task::class, [
            'deadline_time' => Carbon::now()->subDay()
        ]);
        $this->create(Task::class, [
            'deadline_time' => Carbon::now()->subWeek()
        ]);

        $this->artisan('task:expired');

    }
}
