<?php

namespace App\Providers;

use App\Events\UserRegistration;
use App\Listeners\LogUserRegistration;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Реєстрація нового користувача
        UserRegistration::class => [
            // Надсилання сповіщення
            // Логування
            LogUserRegistration::class
        ],
    ];


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
