<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowStatusCategories
{
    /**
     * Returns a list of all status categories
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @return list<Schema\StatusCategory>
     */
    public function getStatusCategories(): array
    {
        return $this->call(
            uri: '/rest/api/3/statuscategory',
            method: 'get',
            success: 200,
            schema: [Schema\StatusCategory::class],
        );
    }

    /**
     * Returns a status category.
     * Status categories provided a mechanism for categorizing "statuses"
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $idOrKey The ID or key of the status category.
     */
    public function getStatusCategory(
        string $idOrKey,
    ): Schema\StatusCategory {
        return $this->call(
            uri: '/rest/api/3/statuscategory/{idOrKey}',
            method: 'get',
            path: compact('idOrKey'),
            success: 200,
            schema: Schema\StatusCategory::class,
        );
    }
}
