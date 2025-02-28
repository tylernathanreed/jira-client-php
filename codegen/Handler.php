<?php

namespace Jira\Codegen;

use Illuminate\Foundation\Exceptions\Handler as BaseHandler;
use Throwable;

class Handler extends BaseHandler
{
    public function report(Throwable $e): void
    {
        return;
    }
}
