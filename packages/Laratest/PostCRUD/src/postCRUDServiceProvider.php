<?php

namespace Laratest\PostCRUD;

use Illuminate\Support\ServiceProvider;

class PostCRUDServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/../config/PostCRUD.php', 'PostCRUD');

        // Register the service the package provides.
        $this->app->singleton('PostCRUD', function ($app) {
            return new PostCRUD;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['PostCRUD'];
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
            __DIR__.'/../config/PostCRUD.php' => config_path('PostCRUD.php'),
        ], 'PostCRUD.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/Laratest'),
        ], 'PostCRUD.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/Laratest'),
        ], 'PostCRUD.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/Laratest'),
        ], 'PostCRUD.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
