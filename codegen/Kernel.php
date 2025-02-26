<?php

namespace Jira\CodeGen;

use Illuminate\Config\Repository;
use Illuminate\Console\Application as Artisan;
use Illuminate\Filesystem\FilesystemServiceProvider;
use Illuminate\Foundation\Console\Kernel as BaseKernel;
use Illuminate\Support\Facades\Facade;
use Jira\CodeGen\Commands;
use ReflectionClass;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Process\Process;
use Illuminate\Foundation\Bootstrap;

class Kernel extends BaseKernel
{
    /** @inheritdoc */
    protected $bootstrappers = [
        Bootstrap\HandleExceptions::class,
        Bootstrap\RegisterProviders::class,
        Bootstrap\BootProviders::class,
    ];

    /** @inheritdoc */
    public function bootstrap(): void
    {
        $this->registerCoreBindings();
        $this->loadConfiguration();
        $this->registerFacadeRoot();
        $this->registerCoreProviders();        

        parent::bootstrap();

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
        $this->app->instance('config', new Repository([
            'app' => [
                'providers' => [],
            ]
        ]));
    }

    protected function registerFacadeRoot(): void
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($this->app);
    }

    protected function registerCoreProviders(): void
    {
        $this->app->register(FilesystemServiceProvider::class);
    }

    /** @inheritdoc */
    protected function commands(): void
    {
        Artisan::starting(
            function ($artisan) {
                $reflectionClass = new ReflectionClass(Artisan::class);
                $commands = array_filter($artisan->all(), function ($command) {
                    return $command instanceof Commands\GeneratorCommand
                        || $command instanceof ListCommand;
                });

                $property = $reflectionClass->getParentClass()->getProperty('commands');

                $property->setAccessible(true);
                $property->setValue($artisan, $commands);
                $property->setAccessible(false);
            }
        );

        Artisan::starting(
            function ($artisan) {
                $artisan->resolveCommands([
                    Commands\MakeOperationGroupCommand::class,
                    Commands\MakeSchemaCommand::class,
                ]);

                $artisan->setContainerCommandLoader();
            }
        );

        Artisan::starting(
            function ($artisan) {
                foreach ($artisan->all() as $command) {
                    if ($command instanceof ListCommand) {
                        $command->setHidden(true);
                    }

                    $artisan->setContainerCommandLoader();
                    $command->setApplication($artisan);
                }
            }
        );
    }
}
