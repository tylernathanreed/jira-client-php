<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueCustomFieldOptionsApps
{
    /**
     * Returns a "paginated" list of all the options of a select list issue field.
     * A select list issue field is a type of "issue field" that enables a user to select a value from a list of options
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the app providing the field.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/issue-field/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     */
    public function getAllIssueFieldOptions(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        string $fieldKey,
    ): Schema\PageBeanIssueFieldOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('fieldKey'),
            success: 200,
            schema: Schema\PageBeanIssueFieldOption::class,
        );
    }

    /**
     * Creates an option for a select list issue field
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * Each field can have a maximum of 10000 options, and each option can have a maximum of 10000 scopes
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the app providing the field.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     */
    public function createIssueFieldOption(
        Schema\IssueFieldOptionCreateBean $request,
        string $fieldKey,
    ): Schema\IssueFieldOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option',
            method: 'post',
            body: $request,
            path: compact('fieldKey'),
            success: 200,
            schema: Schema\IssueFieldOption::class,
        );
    }

    /**
     * Returns a "paginated" list of options for a select list issue field that can be viewed and selected by the user
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param int $projectId Filters the results to options that are only available in the specified project.
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     */
    public function getSelectableIssueFieldOptions(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?int $projectId = null,
        string $fieldKey,
    ): Schema\PageBeanIssueFieldOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option/suggestions/edit',
            method: 'get',
            query: compact('startAt', 'maxResults', 'projectId'),
            path: compact('fieldKey'),
            success: 200,
            schema: Schema\PageBeanIssueFieldOption::class,
        );
    }

    /**
     * Returns a "paginated" list of options for a select list issue field that can be viewed by the user
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param int $projectId Filters the results to options that are only available in the specified project.
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     */
    public function getVisibleIssueFieldOptions(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?int $projectId = null,
        string $fieldKey,
    ): Schema\PageBeanIssueFieldOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option/suggestions/search',
            method: 'get',
            query: compact('startAt', 'maxResults', 'projectId'),
            path: compact('fieldKey'),
            success: 200,
            schema: Schema\PageBeanIssueFieldOption::class,
        );
    }

    /**
     * Returns an option from a select list issue field
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the app providing the field.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     * @param int $optionId The ID of the option to be returned.
     */
    public function getIssueFieldOption(
        string $fieldKey,
        int $optionId,
    ): Schema\IssueFieldOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option/{optionId}',
            method: 'get',
            path: compact('fieldKey', 'optionId'),
            success: 200,
            schema: Schema\IssueFieldOption::class,
        );
    }

    /**
     * Updates or creates an option for a select list issue field.
     * This operation requires that the option ID is provided when creating an option, therefore, the option ID needs to be specified as a path and body parameter.
     * The option ID provided in the path and body must be identical
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the app providing the field.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     * @param int $optionId The ID of the option to be updated.
     */
    public function updateIssueFieldOption(
        Schema\IssueFieldOption $request,
        string $fieldKey,
        int $optionId,
    ): Schema\IssueFieldOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option/{optionId}',
            method: 'put',
            body: $request,
            path: compact('fieldKey', 'optionId'),
            success: 200,
            schema: Schema\IssueFieldOption::class,
        );
    }

    /**
     * Deletes an option from a select list issue field
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the app providing the field.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     * @param int $optionId The ID of the option to be deleted.
     */
    public function deleteIssueFieldOption(
        string $fieldKey,
        int $optionId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option/{optionId}',
            method: 'delete',
            path: compact('fieldKey', 'optionId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deselects an issue-field select-list option from all issues where it is selected.
     * A different option can be selected to replace the deselected option.
     * The update can also be limited to a smaller set of issues by using a JQL query
     * 
     * Connect and Forge app users with *Administer Jira* "global permission" can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`
     * 
     * This is an "asynchronous operation".
     * The response object contains a link to the long-running task
     * 
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the app providing the field.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $replaceWith The ID of the option that will replace the currently selected option.
     * @param string $jql A JQL query that specifies the issues to be updated.
     *                    For example, *project=10000*.
     * @param bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited.
     *                                     Available to Connect and Forge app users with admin permission.
     * @param bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited.
     *                                   Available to Connect and Forge app users with *Administer Jira* "global permission".
     *                                   @link https://confluence.atlassian.com/x/x4dKLg
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**.
     *                         For example, *example-add-on\_\_example-issue-field*.
     *                         To determine the `fieldKey` value, do one of the following:
     *                          - open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module.
     *                         **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager
     *                          - run "Get fields" and in the field details the value is returned in `key`.
     *                         For example, `"key": "teams-add-on__team-issue-field"`
     * @param int $optionId The ID of the option to be deselected.
     */
    public function replaceIssueFieldOption(
        ?int $replaceWith = null,
        ?string $jql = null,
        ?bool $overrideScreenSecurity = false,
        ?bool $overrideEditableFlag = false,
        string $fieldKey,
        int $optionId,
    ): Schema\TaskProgressBeanRemoveOptionFromIssuesResult {
        return $this->call(
            uri: '/rest/api/3/field/{fieldKey}/option/{optionId}/issue',
            method: 'delete',
            query: compact('replaceWith', 'jql', 'overrideScreenSecurity', 'overrideEditableFlag'),
            path: compact('fieldKey', 'optionId'),
            success: 303,
            schema: Schema\TaskProgressBeanRemoveOptionFromIssuesResult::class,
        );
    }
}
