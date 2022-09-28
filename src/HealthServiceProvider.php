<?php

namespace Uuu9\Health;

use Illuminate\Support\ServiceProvider;

class HealthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('health_check', function($app) {
            return new CheckCommand();
        });

        $this->commands(array(
            'health_check'
        ));
    }

    /**
     * Register the service provider.
     *
     */
    public function register()
    {
//        $this->app->get(env('APP_ROUTE_PREFIX', '') . '/health', HealthController::class . '@check');
    }
}
