<?php

namespace App\Http\Controllers\Auth;

use App\Events\EmailVerified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('profile', absolute: false));
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new EmailVerified($request->user()));
        }

        return redirect()->route('profile')->with('status', 'Електронну пошту підтверджено.');
    }
}
