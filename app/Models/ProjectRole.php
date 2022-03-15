<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRole extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'project_role_permission', 'role_id');
    }
}
