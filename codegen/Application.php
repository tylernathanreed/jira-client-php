<?php

namespace Jira\CodeGen;

use LaravelZero\Framework\Application as BaseApplication;

class Application extends BaseApplication
{
    /** @inheritdoc */
    public function version()
    {
        $version = `git describe tags --abbrev=0 2>&1`;

        if (! str_starts_with($version, 'v')) {
            return 'Unreleased';
        }

        return $version;
    }

    /** @inheritdoc */
    public function registerConfiguredProviders(): void
    {
        // Do nothing
    }
}
