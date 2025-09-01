<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Зареєструвати політики та Gate
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-admin-panel', function ($user) {
            return $user->role === 'Admin';
        });
    }
}