<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueCustomFieldOptions
{
    /**
     * Returns a custom field option.
     * For example, an option in a select list
     * 
     * Note that this operation **only works for issue field select list options created in Jira or using operations from the "Issue custom field options" resource**, it cannot be used with issue field select list options created by Connect apps
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** The custom field option is returned as follows:
     * 
     *  - if the user has the *Administer Jira* "global permission"
     *  - if the user has the *Browse projects* "project permission" for at least one project the custom field is used in, and the field is visible in at least one layout the user has permission to view.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the custom field option.
     */
    public function getCustomFieldOption(
        string $id,
    ): Schema\CustomFieldOption {
        return $this->call(
            uri: '/rest/api/3/customFieldOption/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\CustomFieldOption::class,
        );
    }

    /**
     * Returns a "paginated" list of all custom field option for a context.
     * Options are returned first then cascading options, in the order they display in Jira
     * 
     * This operation works for custom field options created in Jira or the operations from this resource.
     * **To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     * @param int $optionId The ID of the option.
     * @param bool $onlyOptions Whether only options are returned.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getOptionsForContext(
        string $fieldId,
        int $contextId,
        ?int $optionId = null,
        ?bool $onlyOptions = false,
        ?int $startAt = 0,
        ?int $maxResults = 100,
    ): Schema\PageBeanCustomFieldContextOption {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/option',
            method: 'get',
            query: compact('optionId', 'onlyOptions', 'startAt', 'maxResults'),
            path: compact('fieldId', 'contextId'),
            success: 200,
            schema: Schema\PageBeanCustomFieldContextOption::class,
        );
    }

    /**
     * Updates the options of a custom field
     * 
     * If any of the options are not found, no options are updated.
     * Options where the values in the request match the current values aren't updated and aren't reported in the response
     * 
     * Note that this operation **only works for issue field select list options created in Jira or using operations from the "Issue custom field options" resource**, it cannot be used with issue field select list options created by Connect apps
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function updateCustomFieldOption(
        Schema\BulkCustomFieldOptionUpdateRequest $request,
        string $fieldId,
        int $contextId,
    ): Schema\CustomFieldUpdatedContextOptionsList {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/option',
            method: 'put',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 200,
            schema: Schema\CustomFieldUpdatedContextOptionsList::class,
        );
    }

    /**
     * Creates options and, where the custom select field is of the type Select List (cascading), cascading options for a custom select field.
     * The options are added to a context of the field
     * 
     * The maximum number of options that can be created per request is 1000 and each field can have a maximum of 10000 options
     * 
     * This operation works for custom field options created in Jira or the operations from this resource.
     * **To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function createCustomFieldOption(
        Schema\BulkCustomFieldOptionCreateRequest $request,
        string $fieldId,
        int $contextId,
    ): Schema\CustomFieldCreatedContextOptionsList {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/option',
            method: 'post',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 200,
            schema: Schema\CustomFieldCreatedContextOptionsList::class,
        );
    }

    /**
     * Changes the order of custom field options or cascading options in a context
     * 
     * This operation works for custom field options created in Jira or the operations from this resource.
     * **To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function reorderCustomFieldOptions(
        Schema\OrderOfCustomFieldOptions $request,
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/option/move',
            method: 'put',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a custom field option
     * 
     * Options with cascading options cannot be deleted without deleting the cascading options first
     * 
     * This operation works for custom field options created in Jira or the operations from this resource.
     * **To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context from which an option should be deleted.
     * @param int $optionId The ID of the option to delete.
     */
    public function deleteCustomFieldOption(
        string $fieldId,
        int $contextId,
        int $optionId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/option/{optionId}',
            method: 'delete',
            path: compact('fieldId', 'contextId', 'optionId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Replaces the options of a custom field
     * 
     * Note that this operation **only works for issue field select list options created in Jira or using operations from the "Issue custom field options" resource**, it cannot be used with issue field select list options created by Connect or Forge apps
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $replaceWith The ID of the option that will replace the currently selected option.
     * @param string $jql A JQL query that specifies the issues to be updated.
     *                    For example, *project=10000*.
     * @param string $fieldId The ID of the custom field.
     * @param int $optionId The ID of the option to be deselected.
     * @param int $contextId The ID of the context.
     */
    public function replaceCustomFieldOption(
        ?int $replaceWith = null,
        ?string $jql = null,
        string $fieldId,
        int $optionId,
        int $contextId,
    ): Schema\TaskProgressBeanRemoveOptionFromIssuesResult {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/option/{optionId}/issue',
            method: 'delete',
            query: compact('replaceWith', 'jql'),
            path: compact('fieldId', 'optionId', 'contextId'),
            success: 303,
            schema: Schema\TaskProgressBeanRemoveOptionFromIssuesResult::class,
        );
    }
}
