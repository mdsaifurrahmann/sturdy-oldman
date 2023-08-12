<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Rules\PasswordStrength;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('password_strength', function ($attribute, $value, $parameters, $validator) {
            return (new PasswordStrength)->passes($attribute, $value);
        });
    }
}
