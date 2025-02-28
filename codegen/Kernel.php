<?php

namespace Jira\CodeGen;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Facade;
use Jira\CodeGen\Commands;
use Jira\CodeGen\Commands\GeneratorCommand;
use Jira\Codegen\Handler;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Application as SymfonyApplication;
use Throwable;

class Kernel
{
    protected ?SymfonyApplication $artisan = null;

    public function __construct(
        protected Application $app
    ) {
    }

    public function handle(InputInterface $input, ?OutputInterface $output = null): int
    {
        try {
            $this->bootstrap();

            return $this->getArtisan()->run($input, $output);
        } catch (Throwable $e) {
            $this->renderException($output, $e);

            return 1;
        }
    }

    /** @inheritDoc */
    public function terminate($input, $status): void
    {
        $this->app->terminate();
    }

    /** @inheritdoc */
    public function bootstrap(): void
    {
        $this->registerCoreBindings();
        $this->loadConfiguration();
        $this->registerFacadeRoot();

        $this->getArtisan()->setName('Jira Client');
    }

    protected function registerCoreBindings(): void
    {
        $this->app->bind(
            'git.version',
            function (Application $app) {
                $process = Process::fromShellCommandline(
                    'git describe --tags --abbrev=0',
                    $app->basePath()
                );

                $process->run();

                return trim($process->getOutput()) ?: 'unreleased';
            }
        );
    }

    protected function loadConfiguration(): void
    {
        $this->app['env'] = 'production';
    }

    protected function registerFacadeRoot(): void
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($this->app);
    }

    protected function getArtisan(): SymfonyApplication
    {
        return $this->artisan ??= $this->resolveArtisan();
    }

    protected function resolveArtisan(): SymfonyApplication
    {
        $artisan = new SymfonyApplication('Jira Client', $this->app->version());

        foreach ($artisan->all() as $command) {
            if ($command instanceof ListCommand || ! $command instanceof GeneratorCommand) {
                $command->setHidden(true);
            }
        }

        $commands = [
            Commands\MakeOperationGroupCommand::class,
            Commands\MakeSchemaCommand::class,
        ];

        foreach ($commands as $command) {
            $instance = new $command;

            $artisan->add($instance);
        }

        return $artisan;
    }

    protected function renderException(OutputInterface $output, Throwable $e)
    {
        $this->app[Handler::class]->renderForConsole($output, $e);
    }
}
