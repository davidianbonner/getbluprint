<?php

namespace Bluprint\Providers;

use Jenssegers\Optimus\Optimus;
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

        $this->setupOptimus($this->app);
    }

    /**
     * Setup the optimus class.
     *
     * @param  Illuminate\Contracts\Foundation\Application $container
     * @return void
     */
    protected function setupOptimus($container)
    {
        $container->singleton(Optimus::class, function ($app) {
            return new Optimus(
                bluprint('optimus.prime'),
                bluprint('optimus.inverse'),
                bluprint('optimus.random')
            );
        });
    }
}
