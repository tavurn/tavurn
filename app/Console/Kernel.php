<?php

namespace App\Console;

use App\Console\Commands\ServeCommand;
use Tavurn\Console\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    protected array $commands = [
        ServeCommand::class,
    ];

    protected function commands(): void
    {
        foreach ($this->commands as $command) {
            if (is_string($command)) {
                $command = $this->app->make($command);
            }

            $this->symfony->add($command);
        }
    }
}
