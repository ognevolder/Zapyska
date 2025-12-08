<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
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
     * Створення нового адміністратора в базі. Store a new admin.
     *
     * @param RegistrationRequest $request
     * @return void
     */
    public function store(RegistrationRequest $request)
    {
        // Створення адміна.
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // Деактивація ключа.
        $key = Key::where('key', $request->key)->first();
        if ($key) {
            $key->used = true;
            $key->save();
        }

        // Подія (Адмін - Реєстрація).

        // Авторизація.
        // Auth::guard('admin')->login($admin);

        // Переадресація на Admin Dashboard.




    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    public function index(): View
    {
        return view('admin.index');
    }
}
