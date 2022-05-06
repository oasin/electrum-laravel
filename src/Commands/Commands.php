<?php

namespace Oasin\Electrumvel\Commands;

use Illuminate\Console\Command;

class Commands extends Command
{
    public $signature = 'electrum';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
