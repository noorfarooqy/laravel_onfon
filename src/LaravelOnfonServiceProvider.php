<?php
namespace Noorfarooqy\LaravelOnfon;

use Illuminate\Support\ServiceProvider;

class LaravelOnfonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/onfonmedia.php' => config_path('onfonmedia.php'),
        ], 'onfon.config');

    }

    public function register()
    {

    }
}
