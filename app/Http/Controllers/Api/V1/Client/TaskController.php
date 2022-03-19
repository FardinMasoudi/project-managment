<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Filters\TaskFilter;
use App\Http\Controllers\ApiController;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskReositoryInterface;

class TaskController extends ApiController
{
    public $taskRepository;

    public function __construct(TaskReositoryInterface $reository)
    {
        $this->taskRepository = $reository;
    }

    public function index(TaskFilter $filter)
    {
        $tasks = $this->taskRepository->getAll($filter);

        return $this->responseOk(TaskResource::collection($tasks));
    }

    public function show($id)
    {
        $task = $this->taskRepository->getById($id);

        return $this->responseOk(TaskResource::make($task));
    }

    public function store(TaskRequest $request)
    {
        $this->taskRepository->create($request);

        return $this->responseOk();
    }

    public function update($id, TaskRequest $request)
    {
        $this->taskRepository->update($id, $request);

        return $this->responseOk();
    }

    public function delete($id)
    {
        $this->taskRepository->destory($id);

        return $this->responseOk();
    }
}
