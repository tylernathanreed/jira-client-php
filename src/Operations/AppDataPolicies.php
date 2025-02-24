<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait AppDataPolicies
{
    /** Returns data policy for the workspace. */
    public function getPolicy(): Schema\WorkspaceDataPolicy
    {
        return $this->call(
            uri: '/rest/api/3/data-policy',
            method: 'get',
            success: 200,
            schema: Schema\WorkspaceDataPolicy::class,
        );
    }

    /**
     * Returns data policies for the projects specified in the request.
     * 
     * @param string $ids A list of project identifiers.
     *                    This parameter accepts a comma-separated list.
     */
    public function getPolicies(
        ?string $ids = null,
    ): Schema\ProjectDataPolicies {
        return $this->call(
            uri: '/rest/api/3/data-policy/project',
            method: 'get',
            query: compact('ids'),
            success: 200,
            schema: Schema\ProjectDataPolicies::class,
        );
    }
}
