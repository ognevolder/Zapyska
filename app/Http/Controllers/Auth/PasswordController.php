<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\PasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the user's password
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $request->user()->update([
            'password' => Hash::make($attributes['password'])
        ]);

        return back()->with('status', 'Пароль успішно змінено!');
    }
}
