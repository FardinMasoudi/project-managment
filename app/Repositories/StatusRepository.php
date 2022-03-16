<?php

namespace App\Repositories;

use App\Interfaces\StatusRepositoryInterface;
use App\Models\Status;

class StatusRepository implements StatusRepositoryInterface
{
    protected $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function getAll()
    {
        return $this->status->all();
    }

    public function create($data)
    {
        return $this->status->create([
            'title' => $data['title'],
            'label' => $data['label']
        ]);
    }
}
