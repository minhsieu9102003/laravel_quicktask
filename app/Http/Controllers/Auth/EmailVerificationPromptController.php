<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
<<<<<<< HEAD
                    ? redirect()->intended(RouteServiceProvider::HOME)
=======
                    ? redirect()->intended(route('dashboard', absolute: false))
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
                    : view('auth.verify-email');
    }
}
