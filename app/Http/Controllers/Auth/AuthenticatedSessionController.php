<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(Request $request): View
    {
        $attemptsLeft = session('login_attempts_left');
        $lockedOut    = false;
        $lockedSeconds = 0;

        // Check if currently locked out (using IP-based key estimate)
        $throttleKey = Str::transliterate(Str::lower($request->input('email', '')) . '|' . $request->ip());
        if (RateLimiter::tooManyAttempts($throttleKey, LoginRequest::MAX_ATTEMPTS)) {
            $lockedOut = true;
            $lockedSeconds = RateLimiter::availableIn($throttleKey);
        }

        return view('auth.login', compact('attemptsLeft', 'lockedOut', 'lockedSeconds'));
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
