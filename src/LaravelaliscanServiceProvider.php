<?php

namespace Odydo\Laravelaliscan;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;




class LaravelaliscanServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/aliscan.php', 'aliscan'
        );
        $this->app->singleton('aliScanClient', function ($app) {
            //return (new Laravelaliscan())->getClient();
            //return new Laravelaliscan('wwww');
            include __DIR__ . '/../aliscan.php';
            return $client;
        });
    }
}