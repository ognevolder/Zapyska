<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestVisit extends Model
{
    protected $fillable = ['place', 'guest_id'];
    protected $table = 'visits';
}
