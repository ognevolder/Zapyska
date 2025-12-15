<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserLogin;
use App\Events\UserLogout;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SessionController
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate('web');

        $request->session()->regenerate();

        // Create an event
        event(new UserLogin(Auth::user()));

        return redirect()->intended(route('profile', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        event(new UserLogout(Auth::user()));

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
