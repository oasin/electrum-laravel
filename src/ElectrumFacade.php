<?php

namespace Oasin\Electrum;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oasin\Electrum\Electrum
 */
class ElectrumFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'electrum';
    }
}
