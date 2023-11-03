<?php

namespace App\Console\Commands;

use OpenSwoole\Process;
use OpenSwoole\Server;
use OpenSwoole\Util;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tavurn\Contracts\Foundation\Application;

class ServeCommand extends Command
{
    protected Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bindImportantInterfaces();

        [$host, $port] = $this->getAddress($input);

        $server = $this->buildServer(
            $host, $port,
        );

        $this->configureServer($server, $input);

        $status = $this->runWithServer($server);

        return ! $status;
    }

    protected function runWithServer(Server $server): bool
    {
        $server->on('start',
            fn (Server $server) => Process::signal(2, $server->shutdown(...)),
        );

        return $this->app->serve($server);
    }

    protected function bindImportantInterfaces(): void
    {
        $this->app->singletonIfNotBound(
            \Tavurn\Contracts\Exceptions\Handler::class,
            \Tavurn\Exceptions\Handler::class,
        );

        $this->app->singletonIfNotBound(
            \Tavurn\Contracts\Http\Kernel::class,
            \App\Http\Kernel::class,
        );
    }

    protected function buildServer(string $host, int $port): Server
    {
        return new \OpenSwoole\Http\Server($host, $port);
    }

    protected function getAddress(InputInterface $input): array
    {
        return ($address = $input->getArgument('address'))
            ? explode(':', $address, 2)
            : array_values($input->getOptions());
    }

    protected function configureServer(Server $server, InputInterface $with): void
    {
        $server->set([
            'worker_num' => (int) $with->getOption('workers'),
        ]);
    }

    protected function configure()
    {
        $this
            ->setName('serve')
            ->setDescription('Start serving your application.')
            ->addArgument('address', InputArgument::OPTIONAL, 'The address your application will be served on.')
            ->addOption('host', mode: InputOption::VALUE_OPTIONAL, default: '127.0.0.1')
            ->addOption('port', mode: InputOption::VALUE_OPTIONAL, default: 8080)
            ->addOption('workers', 'wrk', InputOption::VALUE_OPTIONAL, default: Util::getCPUNum());
    }
}
