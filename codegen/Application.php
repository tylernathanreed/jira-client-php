<?php

namespace Jira\CodeGen;

use Illuminate\Contracts\Console\Kernel as KernelContract;
use Illuminate\Contracts\Debug\ExceptionHandler as HandlerContract;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Foundation\Application as BaseApplication;
use Illuminate\Foundation\Configuration\ApplicationBuilder;

class Application extends BaseApplication
{
    public static function configure(?string $basePath = null): ApplicationBuilder
    {
        $basePath = match (true) {
            is_string($basePath) => $basePath,
            default => static::inferBasePath(),
        };

        $builder = (new ApplicationBuilder(new static($basePath))); // @phpstan-ignore-line

        $builder->create()->singleton(KernelContract::class, Kernel::class);

        $builder->create()->singleton(HandlerContract::class, Handler::class);

        return $builder
            ->withEvents()
            ->withCommands()
            ->withProviders();
    }

    /** @inheritdoc */
    protected function registerBaseBindings(): void
    {
        static::setInstance($this);

        $this->instance('app', $this);
    }

    /** @inheritdoc */
    protected function registerBaseServiceProviders(): void
    {
        $this->register(new EventServiceProvider($this));
    }

    /** @inheritdoc */
    public function version()
    {
        return $this->app->make('git.version');
    }

    /** @inheritdoc */
    public function registerConfiguredProviders(): void
    {
        // Do nothing
    }

    /** @inheritdoc */
    public function runningInConsole(): bool
    {
        return true;
    }

    /** @inheritdoc */
    public function isDownForMaintenance(): bool
    {
        return false;
    }

    /** @inheritdoc */
    public function configurationIsCached(): bool
    {
        return false;
    }

    /** @inheritdoc */
    public function eventsAreCached(): bool
    {
        return false;
    }
}
