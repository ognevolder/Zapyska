<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['email', 'name', 'username', 'password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

    /**
     * Defines if user has admin rights
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
