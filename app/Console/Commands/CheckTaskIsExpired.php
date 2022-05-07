<?php

namespace App\Console\Commands;

use App\Interfaces\TaskReositoryInterface;
use App\Jobs\SendExpiredTaskEmailJobToUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckTaskIsExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check task is exipred';

    private $doingTasks;
    private $expiredTasks = [];

    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(TaskReositoryInterface $reository)
    {
        $this->getDoingTasks($reository)
            ->checkTaskIsExpired()
            ->sendEmailToUsers();
    }

    public function getDoingTasks($repository)
    {
        $this->doingTasks = $repository->getAll("status=doing");

        return $this;
    }

    public function checkTaskIsExpired()
    {
        foreach ($this->doingTasks as $task) {
            if ($task->deadline_time < Carbon::now()) {
                $this->expiredTasks[] = $task;
            }
        }

        return $this;
    }

    public function sendEmailToUsers()
    {
        dispatch(new SendExpiredTaskEmailJobToUser($this->expiredTasks));
    }
}
