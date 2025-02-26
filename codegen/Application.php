<?php

namespace Jira\CodeGen;

use LaravelZero\Framework\Application as BaseApplication;

class Application extends BaseApplication
{
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
}
