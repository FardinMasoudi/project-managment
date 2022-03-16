<?php

namespace App\Filters;

use App\Models\Status;

class SprintFilter extends Filter
{
    protected $filters = [
        'goal',
        'status',
    ];

    public function goal($goal = null)
    {
        $this->builder->where('goal', 'like', "%{$goal}%");
    }

    public function status($status = null)
    {
        $this->builder->where('status_id', Status::getStatusIdByTitle($status));
    }
}
