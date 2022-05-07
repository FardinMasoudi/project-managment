<?php

namespace App\Repositories;

use App\Interfaces\StatusRepositoryInterface;
use App\Models\Status;

class StatusRepository implements StatusRepositoryInterface
{
    protected $statuses;

    public function __construct(Status $status)
    {
        $this->statuses = $status;
    }

    public function getAll()
    {
        return $this->statuses->all();
    }

    public function create($data)
    {
        return $this->statuses->create([
            'title' => $data['title'],
            'label' => $data['label']
        ]);
    }
}
