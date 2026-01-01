<?php

/**
 * Middleware для явного встановлення guard.
 * --------------------------------------------------
 * В маршрутах вказується як 'guard:admin' для Адміністратора,
 * а якщо не вказано - встановлюється web.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UseGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $guard): Response
    {
        Auth::shouldUse($guard);
        return $next($request);
    }
}
