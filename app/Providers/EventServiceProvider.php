<?php

namespace App\Providers;

use App\Events\NewRegistration;
use App\Listeners\LogUserRegistration;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Реєстрація нового користувача
        NewRegistration::class => [
            // Надсилання листа
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
