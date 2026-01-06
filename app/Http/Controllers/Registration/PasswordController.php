<?php

namespace App\Http\Controllers\Registration;

use App\Http\Requests\Registration\AdminPasswordUpdateRequest;
use App\Http\Requests\Registration\UserPasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    protected string $guard;

    /**
     * Визначення guard.
     *
     * @return string
     */
    protected function guard(): String
    {
        return $this->guard = auth()->guard()->name;
    }

    /**
     * Форма зміни паролю. Password change form.
     *
     * @return View
     */
    public function edit(): View
    {
        return view(
            config('auth.password-update_views.' . $this->guard(), 'registration.password-edit')
        );
    }

    protected function update(String $password)
    {
        auth()->guard($this->guard())->user()->update([
            'password' => Hash::make($password)
        ]);

        return redirect()->intended(
            route(config('auth.dashboard_routes.' . $this->guard()))
        );
    }


    /**
     * Update the user's password
     */
    public function user(UserPasswordUpdateRequest $request): RedirectResponse
    {
        return $this->update($request->validated('password'));
    }

    public function admin(AdminPasswordUpdateRequest $request)
    {
        return $this->update($request->validated('password'));
    }
}
