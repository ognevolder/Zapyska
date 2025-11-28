<?php

namespace App\Models;

use App\Notifications\EmailVerification;
use App\Notifications\PasswordResetLink;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime'
        ];
    }

    /**
     * Визначає чи має користувач права адміністратора. Defines if user has admin rights
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Визначає чи має користувач права редактора. Defines if user has editor rights
     *
     * @return boolean
     */
    public function isEditor()
    {
        return $this->role === 'editor';
    }

    /**
     * Повертає всі публікації користувача. Return all user's posts
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Перевірка верифікації електронної пошти. Check the email verification
     */
    public function hasVerifiedEmail()
    {
        return $this->email_verified_at;
    }

    /**
     * Надсилання листа для верифікації електронної пошти. Email verification letter
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerification());
    }

    /**
     * Надсилання листа з посиланням для зміни паролю. Reset password link
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetLink($token));
    }
}
