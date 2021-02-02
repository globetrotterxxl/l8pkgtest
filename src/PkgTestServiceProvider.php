<?php

namespace globetrotterxxl\PkgTest;

use Illuminate\Support\ServiceProvider;

class PkgTestServiceProvider extends ServiceProvider
{

    public function boot(): void
    {

        if( $this->app->runningInConsole()) {

            // publish config
            $this->publishes([
                __DIR__ . '/../config/pkgtest.php' => config_path('pkgtest.php'),
            ],'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/pkgtest'),
            ], 'views');

        }

        $this->loadViewsFrom( __DIR__ . '/../resources/views', 'pkgtest');

    }

    public function register(): void
    {
        
    }


    public function provides()
    {
        return [ 'PkgTest' ];
    }

}
