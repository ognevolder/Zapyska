<?php

namespace App\Http\Controllers\Auth;

use App\Events\NewRegistration;
use App\Events\UserLogin;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.registration');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegistrationRequest $request)
    {
        // Verifying given attributes
        $attributes = $request->validated();

        // Store userdata to DB
        $user = User::create($attributes);

        // Create an event
        event(new NewRegistration($user));

        // Auth a user
        Auth::login($user);

        // Create an event
        event(new UserLogin(Auth::user()));

        // Redirection
        return redirect()->route('profile')->with('success', 'Реєстрація успішна!');
    }
}
