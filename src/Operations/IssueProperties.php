<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueProperties
{
    /**
     * Sets or updates a list of entity property values on issues.
     * A list of up to 10 entity properties can be specified along with up to 10,000 issues on which to set or update that list of entity properties
     * 
     * The value of the request body must be a "valid", non-empty JSON.
     * The maximum length of single issue property value is 32768 characters.
     * This operation can be accessed anonymously
     * 
     * This operation is:
     * 
     *  - transactional, either all properties are updated in all eligible issues or, when errors occur, no properties are updated
     *  - "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function bulkSetIssuesPropertiesList(
        Schema\IssueEntityProperties $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/properties',
            method: 'post',
            body: $request,
            success: 303,
            schema: true,
        );
    }

    /**
     * Sets or updates entity property values on issues.
     * Up to 10 entity properties can be specified for each issue and up to 100 issues included in the request
     * 
     * The value of the request body must be a "valid", non-empty JSON
     * 
     * This operation is:
     * 
     *  - "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     *  - non-transactional.
     * Updating some entities may fail.
     * Such information will available in the task result
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function bulkSetIssuePropertiesByIssue(
        Schema\MultiIssueEntityProperties $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/properties/multi',
            method: 'post',
            body: $request,
            success: 303,
            schema: true,
        );
    }

    /**
     * Sets a property value on multiple issues
     * 
     * The value set can be a constant or determined by a "Jira expression".
     * Expressions must be computable with constant complexity when applied to a set of issues.
     * Expressions must also comply with the "restrictions" that apply to all Jira expressions
     * 
     * The issues to be updated can be specified by a filter
     * 
     * The filter identifies issues eligible for update using these criteria:
     * 
     *  - `entityIds` Only issues from this list are eligible
     *  - `currentValue` Only issues with the property set to this value are eligible
     *  - `hasProperty`:
     *     
     *      - If *true*, only issues with the property are eligible
     *      - If *false*, only issues without the property are eligible
     * 
     * If more than one criteria is specified, they are joined with the logical *AND*: only issues that satisfy all criteria are eligible
     * 
     * If an invalid combination of criteria is provided, an error is returned.
     * For example, specifying a `currentValue` and `hasProperty` as *false* would not match any issues (because without the property the property cannot have a value)
     * 
     * The filter is optional.
     * Without the filter all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible
     * 
     * This operation is:
     * 
     *  - transactional, either all eligible issues are updated or, when errors occur, none are updated
     *  - "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for each project containing issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Edit issues* "project permission" for each issue.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $propertyKey The key of the property.
     *                            The maximum length is 255 characters.
     */
    public function bulkSetIssueProperty(
        Schema\BulkIssuePropertyUpdateRequest $request,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/properties/{propertyKey}',
            method: 'put',
            body: $request,
            path: compact('propertyKey'),
            success: 303,
            schema: true,
        );
    }

    /**
     * Deletes a property value from multiple issues.
     * The issues to be updated can be specified by filter criteria
     * 
     * The criteria the filter used to identify eligible issues are:
     * 
     *  - `entityIds` Only issues from this list are eligible
     *  - `currentValue` Only issues with the property set to this value are eligible
     * 
     * If both criteria is specified, they are joined with the logical *AND*: only issues that satisfy both criteria are considered eligible
     * 
     * If no filter criteria are specified, all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible
     * 
     * This operation is:
     * 
     *  - transactional, either the property is deleted from all eligible issues or, when errors occur, no properties are deleted
     *  - "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* " project permission" for each project containing issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Edit issues* "project permission" for each issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $propertyKey The key of the property.
     */
    public function bulkDeleteIssueProperty(
        Schema\IssueFilterForBulkPropertyDelete $request,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/properties/{propertyKey}',
            method: 'delete',
            body: $request,
            path: compact('propertyKey'),
            success: 303,
            schema: true,
        );
    }

    /**
     * Returns the URLs and keys of an issue's properties
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Property details are only returned where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The key or ID of the issue.
     */
    public function getIssuePropertyKeys(
        string $issueIdOrKey,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/properties',
            method: 'get',
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the key and value of an issue's property
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The key or ID of the issue.
     * @param string $propertyKey The key of the property.
     */
    public function getIssueProperty(
        string $issueIdOrKey,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}',
            method: 'get',
            path: compact('issueIdOrKey', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Sets the value of an issue's property.
     * Use this resource to store custom data against an issue
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $propertyKey The key of the issue property.
     *                            The maximum length is 255 characters.
     */
    public function setIssueProperty(
        string $issueIdOrKey,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}',
            method: 'put',
            path: compact('issueIdOrKey', 'propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes an issue's property
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The key or ID of the issue.
     * @param string $propertyKey The key of the property.
     */
    public function deleteIssueProperty(
        string $issueIdOrKey,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}',
            method: 'delete',
            path: compact('issueIdOrKey', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
