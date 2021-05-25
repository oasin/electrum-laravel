<?php

namespace Oasin\Electrum;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Oasin\Electrum\Commands\ElectrumCommand;

class ElectrumServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('electrum')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_electrum_table')
            ->hasCommand(ElectrumCommand::class);
    }
}
