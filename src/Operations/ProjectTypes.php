<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectTypes
{
    /**
     * Returns all "project types", whether or not the instance has a valid license for each type
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://confluence.atlassian.com/x/Var1Nw
     * 
     * @return list<Schema\ProjectType>
     */
    public function getAllProjectTypes(): array
    {
        return $this->call(
            uri: '/rest/api/3/project/type',
            method: 'get',
            success: 200,
            schema: [Schema\ProjectType::class],
        );
    }

    /**
     * Returns all "project types" with a valid license.
     * 
     * @link https://confluence.atlassian.com/x/Var1Nw
     * 
     * @return list<Schema\ProjectType>
     */
    public function getAllAccessibleProjectTypes(): array
    {
        return $this->call(
            uri: '/rest/api/3/project/type/accessible',
            method: 'get',
            success: 200,
            schema: [Schema\ProjectType::class],
        );
    }

    /**
     * Returns a "project type"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://confluence.atlassian.com/x/Var1Nw
     * 
     * @param 'software'|'service_desk'|'business'|'product_discovery' $projectTypeKey
     *        The key of the project type.
     */
    public function getProjectTypeByKey(
        string $projectTypeKey,
    ): Schema\ProjectType {
        return $this->call(
            uri: '/rest/api/3/project/type/{projectTypeKey}',
            method: 'get',
            path: compact('projectTypeKey'),
            success: 200,
            schema: Schema\ProjectType::class,
        );
    }

    /**
     * Returns a "project type" if it is accessible to the user
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://confluence.atlassian.com/x/Var1Nw
     * 
     * @param 'software'|'service_desk'|'business'|'product_discovery' $projectTypeKey
     *        The key of the project type.
     */
    public function getAccessibleProjectTypeByKey(
        string $projectTypeKey,
    ): Schema\ProjectType {
        return $this->call(
            uri: '/rest/api/3/project/type/{projectTypeKey}/accessible',
            method: 'get',
            path: compact('projectTypeKey'),
            success: 200,
            schema: Schema\ProjectType::class,
        );
    }
}
