<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['post_id', 'viewer_id'];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
