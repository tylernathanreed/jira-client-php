<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectProperties
{
    /**
     * Returns all "project property" keys for the project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     */
    public function getProjectPropertyKeys(
        string $projectIdOrKey,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/properties',
            method: 'get',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the value of a "project property"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project containing the property.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $propertyKey The project property key.
     *                            Use "Get project property keys" to get a list of all project property keys.
     */
    public function getProjectProperty(
        string $projectIdOrKey,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}',
            method: 'get',
            path: compact('projectIdOrKey', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Sets the value of the "project property".
     * You can use project properties to store custom data against the project
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project in which the property is created.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $propertyKey The key of the project property.
     *                            The maximum length is 255 characters.
     */
    public function setProjectProperty(
        string $projectIdOrKey,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}',
            method: 'put',
            path: compact('projectIdOrKey', 'propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes the "property" from a project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project containing the property.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $propertyKey The project property key.
     *                            Use "Get project property keys" to get a list of all project property keys.
     */
    public function deleteProjectProperty(
        string $projectIdOrKey,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}',
            method: 'delete',
            path: compact('projectIdOrKey', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
