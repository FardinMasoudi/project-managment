<?php

namespace App\Repositories;

use App\Interfaces\SprintRepositoryInterface;
use App\Models\Sprint;
use App\Models\Status;
use Carbon\Carbon;

class SprintRepository implements SprintRepositoryInterface
{
    protected $sprintRepository;

    public function __construct(Sprint $sprint)
    {
        $this->sprintRepository = $sprint;
    }


    public function getAll($filter)
    {
        return $this->sprintRepository->with('status')
            ->filter($filter)
            ->currentProject()
            ->get();
    }

    public function getById($id)
    {
        return $this->sprintRepository->where('id', $id)->first();
    }

    public function create($request)
    {
        return $this->sprintRepository->create([
            'project_id' => auth()->user()->currentProject()->id,
            'goal' => $request->goal,
            'start_time' => Carbon::now(),
            'status_id' => Status::getStatusIdByTitle('active')
        ]);
    }

    public function update($id, $request)
    {
        return $this->sprintRepository->where('id', $id)->first()
            ->update([
                'goal' => $request->goal,
                'end_time' => $request->end_time
            ]);
    }
}
