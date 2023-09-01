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
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;


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


            $licenseKey = env('APP_LICENSE');
            $domainName = request()->getHttpHost();

            $client = new Client();

            $serverHost = '127.0.0.1:8003';

            $pingCommand = sprintf('ping -c 1 %s', escapeshellarg($serverHost));
            $pingResult = shell_exec($pingCommand);


            if (strpos($pingResult, '1 received') !== false) {
                try {

                    $response = $client->post('http://127.0.0.1:8000/validate', [
                        'form_params' => [
                            'key' => $licenseKey,
                            'domain' => $domainName
                        ],
                    ]);

                    $getResponse = json_decode($response->getBody(), true);

                    if ($getResponse['status'] != 'valid') {
                        return 'nice';
                    }
                    return view('auth.auth-login', compact('pingResult'));
                } catch (\Exception $exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    if ($statusCode === 404) {
                        // Handle the custom error message for key not found
                        return 'License Key is Not Found!';
                    } else {
                        // Handle other ClientException scenarios
                        return $response->getBody();
                    }
                }
            } else {
                return view('auth.auth-login');
            }



            // return view('auth.auth-login');
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
                return session()->put(['attempt-failed' => 'Too many attempts failed. IP Blocked for 5 Minutes.', 'end_time' => time() + 300]);
            }

            $user = User::where('email', $request->email)
                ->orWhere('username', $request->email)
                ->first();

            if ($user && Hash::check($request->password, $user->password)) {

                if ($user->profile && $user->profile->status == '0') {
                    return session()->flash('error', 'Your account is Inactive!');
                }

                RateLimiter::clear($this->throttleKey());
                return $user;
            } else {
                RateLimiter::hit($this->throttleKey(), $seconds = 300);
                return session()->flash('error', 'You have ' . RateLimiter::remaining($this->throttleKey(), 3) . ' attempts left');
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
