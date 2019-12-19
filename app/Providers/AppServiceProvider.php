<?php

namespace App\Providers;
use App\Gateway\GoogleGateway;
use App\Gateway\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // create a singleton to ensure only one instance is present
        $this->app->singleton(Gateway::class, function($app)
        {
            // return a google gateway
            return new GoogleGateway();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
