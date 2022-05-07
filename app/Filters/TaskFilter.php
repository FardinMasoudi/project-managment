<?php

namespace App\Filters;

use App\Models\Status;

class TaskFilter
{
    protected $filters = [
        'status',
        'onlyMyIssues',
    ];

    public function onlyMyIssues()
    {
        $this->builder->where('assign_to', auth()->user()->id);
    }

    public function status($status = null)
    {
        $this->builder->where('status_id', Status::getStatusIdByTitle($status));
    }
}
