<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectEmail
{
    /**
     * Returns the "project's sender email address"
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/dolKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $projectId The project ID.
     */
    public function getProjectEmail(
        int $projectId,
    ): Schema\ProjectEmailAddress {
        return $this->call(
            uri: '/rest/api/3/project/{projectId}/email',
            method: 'get',
            path: compact('projectId'),
            success: 200,
            schema: Schema\ProjectEmailAddress::class,
        );
    }

    /**
     * Sets the "project's sender email address"
     * 
     * If `emailAddress` is an empty string, the default email address is restored
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission."
     * 
     * @link https://confluence.atlassian.com/x/dolKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $projectId The project ID.
     */
    public function updateProjectEmail(
        Schema\ProjectEmailAddress $request,
        int $projectId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectId}/email',
            method: 'put',
            body: $request,
            path: compact('projectId'),
            success: 204,
            schema: true,
        );
    }
}
