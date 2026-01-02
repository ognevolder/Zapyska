<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\AdminLogin;
use App\Events\Auth\UserLogin;
use App\Http\Requests\Auth\LoginRequest;
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

        $user = Auth::guard($this->guard())->user();

        match ($this->guard())
        {
            'admin' => event(new AdminLogin($user)),
            default => event(new UserLogin($user))
        };

        return redirect()->intended(
            route(config('auth.dashboard_routes.' . $this->guard()))
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard($this->guard())->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
