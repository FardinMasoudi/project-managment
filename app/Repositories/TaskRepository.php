<?php

namespace App\Repositories;

use App\Interfaces\TaskReositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskReositoryInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll()
    {
        return $this->task->with('status', 'reporter', 'assignTo')
            ->get();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($id, $request)
    {
        // TODO: Implement update() method.
    }

    public function destory($id)
    {
        // TODO: Implement destory() method.
    }
}
