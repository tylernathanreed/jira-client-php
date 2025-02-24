<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueCustomFieldContexts
{
    /**
     * Returns a "paginated" list of " contexts" for a custom field.
     * Contexts can be returned as follows:
     * 
     *  - With no other parameters set, all contexts
     *  - By defining `id` only, all contexts from the list of IDs
     *  - By defining `isAnyIssueType`, limit the list of contexts returned to either those that apply to all issue types (true) or those that apply to only a subset of issue types (false)
     *  - By defining `isGlobalContext`, limit the list of contexts return to either those that apply to all projects (global contexts) (true) or those that apply to only a subset of projects (false)
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param bool $isAnyIssueType Whether to return contexts that apply to all issue types.
     * @param bool $isGlobalContext Whether to return contexts that apply to all projects.
     * @param ?list<int> $contextId The list of context IDs.
     *                              To include multiple contexts, separate IDs with ampersand: `contextId=10000&contextId=10001`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getContextsForField(
        string $fieldId,
        ?bool $isAnyIssueType = null,
        ?bool $isGlobalContext = null,
        ?array $contextId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanCustomFieldContext {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context',
            method: 'get',
            query: compact('isAnyIssueType', 'isGlobalContext', 'contextId', 'startAt', 'maxResults'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanCustomFieldContext::class,
        );
    }

    /**
     * Creates a custom field context
     * 
     * If `projectIds` is empty, a global context is created.
     * A global context is one that applies to all project.
     * If `issueTypeIds` is empty, the context applies to all issue types
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     */
    public function createCustomFieldContext(
        Schema\CreateCustomFieldContext $request,
        string $fieldId,
    ): Schema\CreateCustomFieldContext {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context',
            method: 'post',
            body: $request,
            path: compact('fieldId'),
            success: 201,
            schema: Schema\CreateCustomFieldContext::class,
        );
    }

    /**
     * Returns a "paginated" list of defaults for a custom field.
     * The results can be filtered by `contextId`, otherwise all values are returned.
     * If no defaults are set for a context, nothing is returned.
     *  
     * The returned object depends on type of the custom field:
     * 
     *  - `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields
     *  - `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields
     *  - `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons
     *  - `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes
     *  - `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists
     *  - `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users
     *  - `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists
     *  - `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers
     *  - `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers
     *  - `CustomFieldContextDefaultValueURL` (type `url`) for URLs
     *  - `CustomFieldContextDefaultValueProject` (type `project`) for project pickers
     *  - `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers)
     *  - `CustomFieldContextDefaultValueLabels` (type `labels`) for labels
     *  - `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields
     *  - `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields
     *  - `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields
     *  - `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers
     *  - `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers
     * 
     * Forge custom fields "types" are also supported, returning:
     * 
     *  - `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields
     *  - `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields
     *  - `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields
     *  - `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields
     *  - `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields
     *  - `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields
     *  - `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields
     *  - `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields
     *  - `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field, for example `customfield\_10000`.
     * @param ?list<int> $contextId The IDs of the contexts.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getDefaultValues(
        string $fieldId,
        ?array $contextId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanCustomFieldContextDefaultValue {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/defaultValue',
            method: 'get',
            query: compact('contextId', 'startAt', 'maxResults'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanCustomFieldContextDefaultValue::class,
        );
    }

    /**
     * Sets default for contexts of a custom field.
     * Default are defined using these objects:
     * 
     *  - `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields
     *  - `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields
     *  - `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons
     *  - `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes
     *  - `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists
     *  - `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users
     *  - `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists
     *  - `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers
     *  - `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers
     *  - `CustomFieldContextDefaultValueURL` (type `url`) for URLs
     *  - `CustomFieldContextDefaultValueProject` (type `project`) for project pickers
     *  - `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers)
     *  - `CustomFieldContextDefaultValueLabels` (type `labels`) for labels
     *  - `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields
     *  - `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields
     *  - `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields
     *  - `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers
     *  - `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers
     * 
     * Forge custom fields "types" are also supported, returning:
     * 
     *  - `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields
     *  - `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields
     *  - `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields
     *  - `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields
     *  - `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields
     *  - `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields
     *  - `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields
     *  - `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields
     *  - `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields
     * 
     * Only one type of default object can be included in a request.
     * To remove a default for a context, set the default parameter to `null`
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     */
    public function setDefaultValues(
        Schema\CustomFieldContextDefaultValueUpdate $request,
        string $fieldId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/defaultValue',
            method: 'put',
            body: $request,
            path: compact('fieldId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of context to issue type mappings for a custom field.
     * Mappings are returned for all contexts or a list of contexts.
     * Mappings are ordered first by context ID and then by issue type ID
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param ?list<int> $contextId The ID of the context.
     *                              To include multiple contexts, provide an ampersand-separated list.
     *                              For example, `contextId=10001&contextId=10002`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getIssueTypeMappingsForContexts(
        string $fieldId,
        ?array $contextId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanIssueTypeToContextMapping {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/issuetypemapping',
            method: 'get',
            query: compact('contextId', 'startAt', 'maxResults'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanIssueTypeToContextMapping::class,
        );
    }

    /**
     * Returns a "paginated" list of project and issue type mappings and, for each mapping, the ID of a "custom field context" that applies to the project and issue type
     * 
     * If there is no custom field context assigned to the project then, if present, the custom field context that applies to all projects is returned if it also applies to the issue type or all issue types.
     * If a custom field context is not found, the returned custom field context ID is `null`
     * 
     * Duplicate project and issue type mappings cannot be provided in the request
     * 
     * The order of the returned values is the same as provided in the request
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/k44fOw
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getCustomFieldContextsForProjectsAndIssueTypes(
        Schema\ProjectIssueTypeMappings $request,
        string $fieldId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanContextForProjectAndIssueType {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/mapping',
            method: 'post',
            body: $request,
            query: compact('startAt', 'maxResults'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanContextForProjectAndIssueType::class,
        );
    }

    /**
     * Returns a "paginated" list of context to project mappings for a custom field.
     * The result can be filtered by `contextId`.
     * Otherwise, all mappings are returned.
     * Invalid IDs are ignored
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field, for example `customfield\_10000`.
     * @param ?list<int> $contextId The list of context IDs.
     *                              To include multiple context, separate IDs with ampersand: `contextId=10000&contextId=10001`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getProjectContextMapping(
        string $fieldId,
        ?array $contextId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanCustomFieldContextProjectMapping {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/projectmapping',
            method: 'get',
            query: compact('contextId', 'startAt', 'maxResults'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanCustomFieldContextProjectMapping::class,
        );
    }

    /**
     * Updates a " custom field context"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function updateCustomFieldContext(
        Schema\CustomFieldContextUpdateDetails $request,
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}',
            method: 'put',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a " custom field context"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function deleteCustomFieldContext(
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}',
            method: 'delete',
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Adds issue types to a custom field context, appending the issue types to the issue types list
     * 
     * A custom field context without any issue types applies to all issue types.
     * Adding issue types to such a custom field context would result in it applying to only the listed issue types
     * 
     * If any of the issue types exists in the custom field context, the operation fails and no issue types are added
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function addIssueTypesToContext(
        Schema\IssueTypeIds $request,
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/issuetype',
            method: 'put',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes issue types from a custom field context
     * 
     * A custom field context without any issue types applies to all issue types
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function removeIssueTypesFromContext(
        Schema\IssueTypeIds $request,
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/issuetype/remove',
            method: 'post',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Assigns a custom field context to projects
     * 
     * If any project in the request is assigned to any context of the custom field, the operation fails
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function assignProjectsToCustomFieldContext(
        Schema\ProjectIds $request,
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/project',
            method: 'put',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes a custom field context from projects
     * 
     * A custom field context without any projects applies to all projects.
     * Removing all projects from a custom field context would result in it applying to all projects
     * 
     * If any project in the request is not assigned to the context, or the operation would result in two global contexts for the field, the operation fails
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function removeCustomFieldContextFromProjects(
        Schema\ProjectIds $request,
        string $fieldId,
        int $contextId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/context/{contextId}/project/remove',
            method: 'post',
            body: $request,
            path: compact('fieldId', 'contextId'),
            success: 204,
            schema: true,
        );
    }
}
