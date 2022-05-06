<?php

namespace Oasin\Electrumvel\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Routing\Router;
use Oasin\Electrum\Electrumvel;

class ElectrumvelProvider extends ServiceProvider
{
    public const SINGLETON = 'electrumvel';

    public function boot()
    {
        $this->registerConfig(__DIR__ . '/../../config/electrumvel.php', 'electrum.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    /**
     * Registers a configuration
     *
     * @param string $path
     * @param string $name
     */
    protected function registerConfig($path, $name)
    {
        $this->publishes([$path => base_path('config/' . $name)]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(self::SINGLETON, function ($app) {
            return new Electrumvel($app);
        });

        $this->registerAlias(Electrumvel::class, 'electrumvel');
        /*
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/electrum.php',
            'electrumvel'
        );
        */
    }

    /**
     * Register Alias function to register an alias based upon
     * whether they are using lumen or laravel
     *
     * @param string $class
     * @param string $name
     */
    protected function registerAlias($class, $name)
    {
        if ($this->isLaravel()) {
            AliasLoader::getInstance()->alias($name, $class);
        } elseif ($this->isLumen()) {
            if (!class_exists($name)) {
                class_alias($class, $name);
            }
        }
    }

    /**
     * Determines whether this application is an instance of Laravel
     *
     * @return bool
     */
    protected function isLaravel()
    {
        return is_a($this->app, 'Illuminate\Foundation\Application');
    }

    /**
     * Determines whether this application is an instance of Lumen
     *
     * @return bool
     */
    protected function isLumen()
    {
        return is_a($this->app, 'Laravel\Lumen\Application');
    }

    /**
     * Gets the router for the specific application
     *
     * @return \Illuminate\Routing\Router|Router
     */
    protected function router()
    {
        if ($this->isLaravel()) {
            return app('router');
        } else {
            /** @var Application $app */
            $app = $this->app;
            return $app->router;
        }
    }
}
