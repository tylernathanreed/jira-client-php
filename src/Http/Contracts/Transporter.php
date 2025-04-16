<?php

namespace Jira\Client\Http\Contracts;

use Jira\Client\Configuration;
use Jira\Client\Http\PendingOperation;
use Jira\Client\Http\Request;
use Jira\Client\Http\Response;

interface Transporter
{
    public function newRequest(PendingOperation $operation, Configuration $config): Request;

    public function newResponse(Request $request, Configuration $config): Response;
}
