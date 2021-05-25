<?php

namespace Oasin\Electrum\Commands;

use Illuminate\Console\Command;

class ElectrumCommand extends Command
{
    public $signature = 'electrum';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
