<?php

namespace Oasin\Electrumvel\Facades;

use Illuminate\Support\Facades\Facade;
use Oasin\Electrumvel\Providers\ElectrumvelProvider;

class ElectrumvelFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return ElectrumvelProvider::SINGLETON;
    }
}
