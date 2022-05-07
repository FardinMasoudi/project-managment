<?php

namespace App\Jobs;

use App\Mail\ExpiredTaskEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendExpiredTaskEmailJobToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $expiredTasks;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($expiredTasks)
    {
        $this->expiredTasks = $expiredTasks;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ExpiredTaskEmail $email)
    {
        foreach ($this->expiredTasks as $task) {
            Mail::to($task->assignTo->email)->send($email);
        }
    }
}
