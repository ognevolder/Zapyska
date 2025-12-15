<?php

// Основне Middleware для обробки запитів від неавторизованих користувачів.

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;

class Authenticate extends BaseAuthenticate
{
    /**
     * Where to redirect if user is not authenticated.
     */
    protected function redirectTo($request)
    {
        // Якщо запит очікує JSON-відповідь - закриття доступу.
        if ($request->expectsJson()) {
            return null;
        }

        // Переадресація
        switch (true) {
        case $request->routeIs('admin.*'):
            return route(config('auth.login_routes.admin'));

        case $request->routeIs('editor.*'):
            return route(config('auth.login_routes.editor'));

        default:
            return route(config('auth.login_routes.web'));
        }
    }
}