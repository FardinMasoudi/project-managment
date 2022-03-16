<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\ApiController;
use App\Http\Requests\SprintRequest;
use App\Http\Resources\SprintResource;
use App\Interfaces\SprintRepositoryInterface;
use App\Models\Sprint;
use App\Models\Status;

class SprintController extends ApiController
{
    private $sprintRepository;

    public function __construct(SprintRepositoryInterface $repository)
    {
        $this->sprintRepository = $repository;
    }

    public function index()
    {
        $sprints = $this->sprintRepository->getAll();

        return $this->responseOk(SprintResource::collection($sprints));
    }

    public function show($sprintId)
    {
        $sprint = $this->sprintRepository->getById($sprintId);

        return $this->responseOk(SprintResource::make($sprint));
    }

    public function store(SprintRequest $request)
    {
        $this->sprintRepository->create($request);

        return $this->responseOk();
    }

    public function update($id, SprintRequest $request)
    {
        $this->sprintRepository->update($id, $request);

        return $this->responseOk();
    }
}
