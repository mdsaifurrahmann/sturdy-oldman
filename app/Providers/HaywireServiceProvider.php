<?php

namespace App\Providers;

use App\Haywire\Haywire;
use Illuminate\Support\ServiceProvider;

class HaywireServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('haywire', function () {
            return new Haywire();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
