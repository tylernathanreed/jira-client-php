<?php

namespace Jira\Client;

use Reedware\OpenApi\Client\Client as OpenApiClient;

class Client extends OpenApiClient
{
    use PerformsOperations;
}
