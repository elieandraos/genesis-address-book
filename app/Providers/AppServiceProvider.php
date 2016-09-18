<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Genesis\Repositories\UserRepositoryInterface',
            'App\Genesis\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Genesis\Repositories\ContactRepositoryInterface',
            'App\Genesis\Repositories\ContactRepository'
        );        
    }
}
