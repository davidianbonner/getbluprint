<?php

namespace Bluprint\Providers;

use Illuminate\Support\ServiceProvider;

class BluprintServiceProvider extends ServiceProvider
{
    public function boot()
    {
        require __DIR__.'/../helpers.php';
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/bluprint.php', 'bluprint'
        );
    }
}
