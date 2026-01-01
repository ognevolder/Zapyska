<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\Admin\RegistrationRequest;
use App\Models\Admin;
use App\Models\Key;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController
{


    /**
     * Форма для авторизації адміністратора. Login-form view.
     *
     * @return View
     */
    public function show(): View
    {
        return view('admin.show');
    }



    public function login(LoginRequest $request)
    {
        $guard = $this->resolveGuardFromRoute(); // admin / editor / web

        $request->setGuard($guard)->authenticate();

        return redirect()->route(config("auth.dashboard_routes.$guard"));
    }

    public function index(): View
    {
        return view('admin.index');
    }

    protected function resolveGuardFromRoute(): string
    {
        return match (true) {
            request()->routeIs('admin.*')  => 'admin',
            request()->routeIs('editor.*') => 'editor',
            default                        => 'web',
        };
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth');
    }
}
