<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowStatuses
{
    /**
     * Returns a list of all statuses associated with active workflows
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @return list<Schema\StatusDetails>
     */
    public function getStatuses(): array
    {
        return $this->call(
            uri: '/rest/api/3/status',
            method: 'get',
            success: 200,
            schema: [Schema\StatusDetails::class],
        );
    }

    /**
     * Returns a status.
     * The status must be associated with an active workflow to be returned
     * 
     * If a name is used on more than one status, only the status found first is returned.
     * Therefore, identifying the status by its ID may be preferable
     * 
     * This operation can be accessed anonymously
     * 
     * "Permissions" required: None.
     * 
     * @param string $idOrName The ID or name of the status.
     */
    public function getStatus(
        string $idOrName,
    ): Schema\StatusDetails {
        return $this->call(
            uri: '/rest/api/3/status/{idOrName}',
            method: 'get',
            path: compact('idOrName'),
            success: 200,
            schema: Schema\StatusDetails::class,
        );
    }
}
