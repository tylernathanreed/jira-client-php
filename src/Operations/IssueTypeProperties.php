<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueTypeProperties
{
    /**
     * Returns all the "issue type property" keys of the issue type
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission" to get the property keys of any issue type
     *  - *Browse projects* "project permission" to get the property keys of any issue types associated with the projects the user has permission to browse.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueTypeId The ID of the issue type.
     */
    public function getIssueTypePropertyKeys(
        string $issueTypeId,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/issuetype/{issueTypeId}/properties',
            method: 'get',
            path: compact('issueTypeId'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the key and value of the "issue type property"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission" to get the details of any issue type
     *  - *Browse projects* "project permission" to get the details of any issue types associated with the projects the user has permission to browse.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueTypeId The ID of the issue type.
     * @param string $propertyKey The key of the property.
     *                            Use "Get issue type property keys" to get a list of all issue type property keys.
     */
    public function getIssueTypeProperty(
        string $issueTypeId,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}',
            method: 'get',
            path: compact('issueTypeId', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Creates or updates the value of the "issue type property".
     * Use this resource to store and update data against an issue type
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeId The ID of the issue type.
     * @param string $propertyKey The key of the issue type property.
     *                            The maximum length is 255 characters.
     */
    public function setIssueTypeProperty(
        string $issueTypeId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}',
            method: 'put',
            path: compact('issueTypeId', 'propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes the "issue type property"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeId The ID of the issue type.
     * @param string $propertyKey The key of the property.
     *                            Use "Get issue type property keys" to get a list of all issue type property keys.
     */
    public function deleteIssueTypeProperty(
        string $issueTypeId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}',
            method: 'delete',
            path: compact('issueTypeId', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
