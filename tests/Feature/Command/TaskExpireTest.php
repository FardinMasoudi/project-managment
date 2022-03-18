<?php

namespace Tests\Feature\Command;

use App\Mail\ExpiredTaskEmail;
use App\Mail\WelcomeInvitationMail;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
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
        Mail::fake();

        $this->create(Task::class, [
            'deadline_time' => Carbon::now()->subDay()
        ]);
        $this->create(Task::class, [
            'deadline_time' => Carbon::now()->subWeek()
        ]);

        $this->artisan('task:expired');


        Mail::assertSent(ExpiredTaskEmail::class);
    }
}
