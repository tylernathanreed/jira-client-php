<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ApplicationRoles
{
    /**
     * Returns all application roles.
     * In Jira, application roles are managed using the "Application access configuration" page
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/3YxjL
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getAllApplicationRoles(): true
    {
        return $this->call(
            uri: '/rest/api/3/applicationrole',
            method: 'get',
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns an application role
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $key The key of the application role.
     *                    Use the "Get all application roles" operation to get the key for each application role.
     */
    public function getApplicationRole(
        string $key,
    ): Schema\ApplicationRole {
        return $this->call(
            uri: '/rest/api/3/applicationrole/{key}',
            method: 'get',
            path: compact('key'),
            success: 200,
            schema: Schema\ApplicationRole::class,
        );
    }
}
