<?php

namespace Jira\CodeGen;

use Illuminate\Console\Application as Artisan;
use Jira\CodeGen\Commands;
use LaravelZero\Framework\Kernel as BaseKernel;
use ReflectionClass;
use Symfony\Component\Console\Command\ListCommand;

class Kernel extends BaseKernel
{
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

        /*
         * Registers a bootstrap callback on the artisan console application
         * in order to call the schedule method on each Laravel Zero
         * command class.
         */
        Artisan::starting(
            function ($artisan) {
                $artisan->resolveCommands([
                    Commands\MakeOperationGroupCommand::class,
                    Commands\MakeSchemaCommand::class,
                ]);

                $artisan->setContainerCommandLoader();
            }
        );
    }

}
