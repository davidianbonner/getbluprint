<?php

namespace Bluprint\Tests;

use Bluprint\Providers\BluprintServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            BluprintServiceProvider::class
        ];
    }
}
