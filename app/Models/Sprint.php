<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;
    use FilterTrait;

    protected $guarded = [''];


    public function scopeCurrentProject($query)
    {
        return $query->where('project_id', auth()->user()->currentProject()->id);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
