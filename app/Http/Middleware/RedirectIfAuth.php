<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Якщо запит очікує JSON-відповідь - пропуск.
        if ($request->expectsJson()) {
            return null;
        }

        // Мапа guards
        $guards = array_keys(config('auth.guards', []));

        foreach ($guards as $guard) {
            // Визначаємо області реєстрації через префікс
            if ($request->is("$guard/registration") || $request->is("$guard/registration/*")) {

                // якщо guard не має маршруту реєстрації → забороняємо
                if (! config("auth.registration_routes.$guard")) {
                    abort(404);
                }

                // якщо користувач ПІД ЦИМ guard ВЖЕ залогінений → не пускаємо на форму
                if (Auth::guard($guard)->check()) {
                    $dashboard = config("auth.dashboard_routes.$guard", "/");
                    return redirect()->route($dashboard);
                }
            }
        }
        return $next($request);
    }
}
