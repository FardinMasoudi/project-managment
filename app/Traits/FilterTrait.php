<?php

namespace App\Traits;

use App\Filters\Filter;

trait FilterTrait
{

    public function scopeFilter($query, Filter $filters)
    {
        return $filters->apply($query);
    }

}
