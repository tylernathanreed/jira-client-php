<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueWorklogProperties
{
    /**
     * Returns the keys of all properties for a worklog
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $worklogId The ID of the worklog.
     */
    public function getWorklogPropertyKeys(
        string $issueIdOrKey,
        string $worklogId,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties',
            method: 'get',
            path: compact('issueIdOrKey', 'worklogId'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the value of a worklog property
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $worklogId The ID of the worklog.
     * @param string $propertyKey The key of the property.
     */
    public function getWorklogProperty(
        string $issueIdOrKey,
        string $worklogId,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}',
            method: 'get',
            path: compact('issueIdOrKey', 'worklogId', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Sets the value of a worklog property.
     * Use this operation to store custom data against the worklog
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Edit all worklogs*" project permission" to update any worklog or *Edit own worklogs* to update worklogs created by the user
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $worklogId The ID of the worklog.
     * @param string $propertyKey The key of the issue property.
     *                            The maximum length is 255 characters.
     */
    public function setWorklogProperty(
        string $issueIdOrKey,
        string $worklogId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}',
            method: 'put',
            path: compact('issueIdOrKey', 'worklogId', 'propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes a worklog property
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $worklogId The ID of the worklog.
     * @param string $propertyKey The key of the property.
     */
    public function deleteWorklogProperty(
        string $issueIdOrKey,
        string $worklogId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}',
            method: 'delete',
            path: compact('issueIdOrKey', 'worklogId', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
