<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        //
        Schema::defaultStringLength(191);
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        if (env('APP_ENV') === 'production') {
            $this->app['request']->server->set('HTTPS','on'); // this line
    
            URL::forceScheme('https');
        }

        URL::forceScheme('https');
    }
}
