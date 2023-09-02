<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Illuminate\Support\Str;


class NukeServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        RateLimiter::for('login', function (Request $request) {
            $email = (string)$request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        Fortify::loginView(function () {
            return view('auth.auth-login');
        });

        Fortify::registerView(function () {
            return view('auth.auth-register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.auth-forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.auth-reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('auth.auth-verify-email');
        });

        // Authenticate
        Fortify::authenticateUsing(function (Request $request) {

            if (!$this->checkTooManyFailedAttempts()) {
                return session()->put(['attempt-failed' => decrypt('eyJpdiI6IjduTDV0Zmw3bHBrTEFVYXQ0c1Z6QlE9PSIsInZhbHVlIjoidEVHbXdlbVFmSk1yQTNLQTlmSmVSd3BwSnEvV0hKM3YyVTZYUFBaOFZFVnBIMW1GSm11RWdVRU45UjR1N0MwdWFWT3hYWFAzMzVqbUI4N1MydnpObmc9PSIsIm1hYyI6IjQ3ODE5NTI3ZGU3ODlmOTZjNDI2MGZjNWVmZjZlZjA0NGM5MzlkZmRkNjUyMzEwZDhjYjhiNWRkOWE0OGExOWEiLCJ0YWciOiIifQ=='), 'end_time' => time() + 300]);
            }

            $user = User::where('email', $request->email)
                ->orWhere('username', $request->email)
                ->first();

            if ($user && Hash::check($request->password, $user->password)) {

                if ($user->profile && $user->profile->status == '0') {
                    return session()->flash('error', decrypt('eyJpdiI6IkJHTjU2d3NIQTkrL0NRem9RNFBraHc9PSIsInZhbHVlIjoidDhSNjFmaGordnBzeGg3MkJRbFBrZmQrc1BNSEozQTliUm8yelBqNWg3YVhyVkwzWmtlQ09OUTZLOGV1aTVhKyIsIm1hYyI6IjE5OTNiNmIzZGUxMTk0YTQwY2M4MTE3MGM1Y2UyN2FkOTVjNzI5NmEzMmZiODRhYmYyNTA1YmJmMWMxNGYxN2YiLCJ0YWciOiIifQ=='));
                }

                RateLimiter::clear($this->throttleKey());

                $haywire = app('haywire');
                $check = $haywire->wire();

                if ($check == 'indispose') {
                    return session()->flash('error', decrypt('eyJpdiI6Ik0rYlI2WnNRMXc0VEtEUjV6RkcrM0E9PSIsInZhbHVlIjoiTEJVR1AvKzdVMEEzK3lUMGZmaVRad3I3ampRanlnTm5CTkNaWW9TVm1WeVNabWVXb2k3aVd3WDAzeWwwSTh1SiIsIm1hYyI6IjdjYzQwMGNlNDJkN2Q5ZDU4YmI1MGQxYTdjZDU2N2NlYzVmZDFjZjdhNmVkN2MwMTEyNmFkZjE2NzliMGIwN2YiLCJ0YWciOiIifQ=='));
                }

                if ($check == 'ghost') {
                    return session()->flash('error', decrypt('eyJpdiI6Im9BTEd0ZDU4aUpOQVZ6NS9lMVI1ZFE9PSIsInZhbHVlIjoiWENBVmYxeFN0ZUo5aU5id3I5WVkyV2JjdUprQUxXRnkwcXBSRk03ZVlYVT0iLCJtYWMiOiI4MDcwZDY4ZDNkMzEzYTJlMmNmZTU2NjUzNjVjYWQ2MGU0MmQwZDM2NmFjYjIxODUzNzZiMWMyMWEzOWM1NWYwIiwidGFnIjoiIn0='));
                }

                return $user;
            } else {
                RateLimiter::hit($this->throttleKey(), $seconds = 300);
                return session()->flash('error', decrypt('eyJpdiI6Iml0Nm9xMlk0azVWUXR6ZHRKMUtEL1E9PSIsInZhbHVlIjoiNE5OV3VrQmxycDgvUW5JZWZmd2YvSFM0MGJ4TEQ4OXNFeEZYOUJyTi9vZz0iLCJtYWMiOiI5MGViOGZiNTk5MDFmZTI2NTU1MjNhOTI2YmI2OWQ3MGRlNmEzMDUwZjlhNjkyNTVkNTZhY2JkZWIzOWIwOGVlIiwidGFnIjoiIn0=') . RateLimiter::remaining($this->throttleKey(), 3) . decrypt('eyJpdiI6IkhIbDJrRWtoREt3aUFwYjRVNklManc9PSIsInZhbHVlIjoiWm1qNW5idjBSUndiNU1OYk1LUVJKSDZzbGxLZjFaWWc0dzE0VHBFR0hlRT0iLCJtYWMiOiJhNmEyNDAzYTdiNzk3NjMxM2I4NzUzNjE1NDJiYzkzYTU5MDU2NGFiNjQwNGUwMzIyZmQ5YjY1Y2Q2Y2M4MmE3IiwidGFnIjoiIn0='));
            }
        });

        Fortify::authenticateThrough(function (Request $request) {
            return array_filter([
                config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
                // RedirectIfTwoFactorAuthenticatable::class,
                AttemptToAuthenticate::class,
                PrepareAuthenticatedSession::class,
            ]);
        });
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     */
    public function checkTooManyFailedAttempts()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower(request('email')) || request()->ip();
    }
}
