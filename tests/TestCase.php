<?php

namespace Oasin\Electrum\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Oasin\Electrum\ElectrumServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Oasin\\Electrum\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ElectrumServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_electrum_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
