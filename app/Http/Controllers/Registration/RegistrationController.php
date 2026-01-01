<?php

/**
 * ----------------------------------------------------------
 * Модуль [Реєстрація]
 * ----------------------------------------------------------
 * Контролер реєстрації користувача або адміністратора.
 * * * * * * * *
 * Виклик форми реєстрації відповідно до запиту.
 * Створення користувача або адміністратора в БД.
 * Запис події (Реєстрація).
 * Переадресація на сторінку авторизації відповідно до типу користувача.
 */

namespace App\Http\Controllers\Registration;

use App\Events\Registration\AdminRegistration;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use App\Events\Registration\UserRegistration;
use App\Http\Requests\Registration\AdminRegistrationRequest;
use App\Http\Requests\Registration\UserRegistrationRequest;
use App\Models\Admin;
use App\Models\Key;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    protected string $guard;

    /**
     * Встановлення guard.
     *
     * @return string
     */
    protected function guard(): String
    {
        return $this->guard = Auth::getDefaultDriver();
    }

    /**
     * Реєстрація користувача
     *
     * @param array $data
     * @param string $guard
     * @return void
     */
    protected function register(string $guard)
    {
        // Перенаправлення на сторінку авторизації
        return view('registration.welcome', ['guard' => $guard]);
    }

    /**
     * Виклик сторінки з формою реєстрації відповідно до запиту ($guard).
     * Display the registration view.
     */
    public function create(): View
    {
        return view(
            config('auth.registration_views.' . $this->guard(), 'registration.registration')
        );
    }

    public function user(UserRegistrationRequest $request)
    {
        $user = User::create($request->validated());
        event(new UserRegistration($user));
        return $this->register($this->guard());
    }

    public function admin(AdminRegistrationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $admin = Admin::create($request->validated());
            $key = Key::where('key', $request->key)->first();
            $key->update(['used' => true]);
        DB::afterCommit(function () use ($admin, $key) {
            event(new AdminRegistration($admin, $key));
        });
        });
        return $this->register($this->guard());
    }
}
