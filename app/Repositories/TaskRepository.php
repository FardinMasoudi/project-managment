<?php

namespace App\Repositories;

use App\Interfaces\TaskReositoryInterface;
use App\Models\Status;
use App\Models\Task;

class TaskRepository implements TaskReositoryInterface
{
    protected $tasks;

    public function __construct(Task $task)
    {
        $this->tasks = $task;
    }

    public function getAll($filters)
    {
        return $this->tasks->with('status', 'reporter', 'assignTo')
            ->get();
    }

    public function getById($id)
    {
        return $this->tasks->where('id', $id)->first();
    }

    public function create($request)
    {
        return $this->tasks->create([
            'project_id' => auth()->user()->currentProject()->id,
            'sprint_id' => $request->sprint_id,
            'reporter_id' => auth()->user()->id,
            'assign_to' => $request->assign_to,
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'deadline_time' => $request->deadline_time,
            'type' => $request->type,
            'status_id' => Status::getStatusIdByTitle('todo')
        ]);
    }

    public function update($id, $request)
    {
        return $this->tasks->where('id', $id)->first()
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'deadline_time' => $request->deadline_time,
                'sprint_id' => $request->sprint_id,
                'type' => $request->type,
                'assign_to' => $request->assign_to,
                'parent_id' => $request->parent_id,
            ]);
    }

    public function destory($id)
    {
        return $this->tasks->find($id)->delete();
    }
}
