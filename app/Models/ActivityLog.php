<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['event', 'user_id', 'data'];

    protected $casts = [
        'data' => 'array'
    ];
}
