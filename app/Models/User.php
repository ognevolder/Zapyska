<?php

namespace App\Models;

use App\Notifications\EmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'name',
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime'
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

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerification());
    }
}
