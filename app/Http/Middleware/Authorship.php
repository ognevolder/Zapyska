<?php

namespace App\Http\Middleware;

use App\Models\Writing;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authorship
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $writing = $request->route('id')
        ? Writing::find($request->route('id'))
        : null;

        if (!$writing || $writing->authorship !== true) {
            abort(403, 'У вас недостатньо прав для доступу. Зверніться до адміністратора.');
        }

    return $next($request);
    }
}
