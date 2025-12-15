<?php

// Middleware для заміни значень cookie в сесії, залежно від авторизованого користувача та його ролі.

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class UseRoleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        switch (true)
        {
            case $request->is('admin/*'):
                Config::set('session_cookie', 'admin_cookie');
                break;

            case $request->is('editor/*'):
                Config::set('session_cookie', 'editor_cookie');
                break;

            default:
            // Web guard
                Config::set('session.cookie', config('session.cookie'));
        }

        return $next($request);
    }
}
