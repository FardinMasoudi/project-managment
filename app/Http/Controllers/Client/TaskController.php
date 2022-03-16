<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskReositoryInterface;

class TaskController extends ApiController
{
    public $taskRepository;

    public function __construct(TaskReositoryInterface $reository)
    {
        $this->taskRepository = $reository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->getAll();

        return $this->responseOk(TaskResource::collection($tasks));
    }
}
