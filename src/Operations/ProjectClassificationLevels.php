<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectClassificationLevels
{
    /**
     * Returns the default data classification for a project
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse Projects* "project permission" for the project
     *  - *Administer projects* "project permission" for the project
     *  - *Administer jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case-sensitive).
     */
    public function getDefaultProjectClassification(
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/classification-level/default',
            method: 'get',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Updates the default data classification level for a project
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission" for the project
     *  - *Administer jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case-sensitive).
     */
    public function updateDefaultProjectClassification(
        Schema\UpdateDefaultProjectClassificationBean $request,
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/classification-level/default',
            method: 'put',
            body: $request,
            path: compact('projectIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Remove the default data classification level for a project
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission" for the project
     *  - *Administer jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case-sensitive).
     */
    public function removeDefaultProjectClassification(
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/classification-level/default',
            method: 'delete',
            path: compact('projectIdOrKey'),
            success: 204,
            schema: true,
        );
    }
}
