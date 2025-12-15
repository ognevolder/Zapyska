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
     * Форма реєстрації адміністратора. Registration-form view.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.create');
    }

    /**
     * Форма для авторизації адміністратора. Login-form view.
     *
     * @return View
     */
    public function show(): View
    {
        return view('admin.show');
    }

    /**
     * Створення нового адміністратора в базі. Store a new admin.
     *
     * @param RegistrationRequest $request
     * @return void
     */
    public function store(RegistrationRequest $request)
    {
        // Валідація
        $attributes = $request->validated();

        // Створення адміна.
        $admin = Admin::create($attributes);

        // Деактивація ключа.
        $key = Key::where('key', $request->key)->first();
        if ($key) {
            $key->used = true;
            $key->save();
        }

        // Подія (Адмін - Реєстрація).

        // Авторизація.
        Auth::guard('admin')->login($admin);

        // Переадресація на Admin Dashboard.
        return redirect()->intended(route('admin.profile', absolute: false));
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
