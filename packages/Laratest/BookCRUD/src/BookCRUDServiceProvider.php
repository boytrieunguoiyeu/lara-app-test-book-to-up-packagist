<?php

namespace Laratest\BookCRUD;

use Illuminate\Support\ServiceProvider;

class BookCRUDServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'Laratest');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'Laratest');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bookcrud.php', 'bookcrud');

        // Register the service the package provides.
        $this->app->singleton('bookcrud', function ($app) {
            return new BookCRUD;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bookcrud'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/bookcrud.php' => config_path('bookcrud.php'),
        ], 'bookcrud.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/Laratest'),
        ], 'bookcrud.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/Laratest'),
        ], 'bookcrud.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/Laratest'),
        ], 'bookcrud.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
