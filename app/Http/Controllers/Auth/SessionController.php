<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserLogout;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SessionController
{
    protected $guard;

    /**
     * Встановлення guard.
     *
     * @return void
     */
    protected function guard()
    {
        return $this->guard = Auth::getDefaultDriver();
    }

    public function create(): View
    {
        return view(
            config('auth.login_views.' . $this->guard(), 'auth.login')
        );
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate($this->guard());

        $request->session()->regenerate();

        // event(new UserLogin(Auth::guard($request->guard())->user()));

        return redirect()->intended(
            route(config('auth.dashboard_routes.' . $this->guard()))
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $guard = Auth::getDefaultDriver();

        event(new UserLogout(Auth::guard($guard)->user()));

        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
