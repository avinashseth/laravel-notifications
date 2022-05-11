<?php

namespace Avinash\Seth;

use Illuminate\Support\ServiceProvider;

class AvinashSethProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'seth');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/avinash/seth'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('Avinash\Seth\GreetingController');
    }
}
