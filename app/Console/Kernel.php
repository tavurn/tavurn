<?php

namespace App\Console;

use Tavurn\Console\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    protected function commands(): void
    {
        $this->load(
            base_path('app/Console/Commands'),
        );
    }
}
