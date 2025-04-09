<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ServerInfo
{
    /**
     * Returns information about the Jira instance
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     */
    public function getServerInfo(): Schema\ServerInformation
    {
        return $this->call(
            uri: '/rest/api/3/serverInfo',
            method: 'get',
            success: 200,
            schema: Schema\ServerInformation::class,
        );
    }
}
