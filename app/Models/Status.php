<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public static function getStatusIdByTitle($title)
    {
        return self::where('title', $title)->firstOrFail()->id;
    }
}
