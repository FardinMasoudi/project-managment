<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function assignTo()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }
}
