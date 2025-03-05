<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueFields
{
    /**
     * Returns system and custom issue fields according to the following rules:
     * 
     *  - Fields that cannot be added to the issue navigator are always returned
     *  - Fields that cannot be placed on an issue screen are always returned
     *  - Fields that depend on global Jira settings are only returned if the setting is enabled.
     * That is, timetracking fields, subtasks, votes, and watches
     *  - For all other fields, this operation only returns the fields that the user has permission to view (that is, the field is used in at least one project that the user has *Browse Projects* "project permission" for.)
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @return list<Schema\FieldDetails>
     */
    public function getFields(): array
    {
        return $this->call(
            uri: '/rest/api/3/field',
            method: 'get',
            success: 200,
            schema: [Schema\FieldDetails::class],
        );
    }

    /**
     * Creates a custom field
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createCustomField(
        Schema\CustomFieldDefinitionJsonBean $request,
    ): Schema\FieldDetails {
        return $this->call(
            uri: '/rest/api/3/field',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\FieldDetails::class,
        );
    }

    /**
     * Returns a "paginated" list of fields for Classic Jira projects.
     * The list can include:
     * 
     *  - all fields
     *  - specific fields, by defining `id`
     *  - fields that contain a string in the field name or description, by defining `query`
     *  - specific fields that contain a string in the field name or description, by defining `id` and `query`
     * 
     * Use `type` must be set to `custom` to show custom fields only
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<'custom'|'system'> $type The type of fields to search.
     * @param ?list<string> $id The IDs of the custom fields to return or, where `query` is specified, filter.
     * @param string $query String used to perform a case-insensitive partial match with field names or descriptions.
     * @param 'contextsCount'|'-contextsCount'|'+contextsCount'|'lastUsed'|'-lastUsed'|'+lastUsed'|'name'|'-name'|'+name'|'screensCount'|'-screensCount'|'+screensCount'|'projectsCount'|'-projectsCount'|'+projectsCount'|null $orderBy
     *        "Order" the results by:
     *         - `contextsCount` sorts by the number of contexts related to a field
     *         - `lastUsed` sorts by the date when the value of the field last changed
     *         - `name` sorts by the field name
     *         - `screensCount` sorts by the number of screens related to a field
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `key` returns the key for each field
     *                        - `stableId` returns the stableId for each field
     *                        - `lastUsed` returns the date when the value of the field last changed
     *                        - `screensCount` returns the number of screens related to a field
     *                        - `contextsCount` returns the number of contexts related to a field
     *                        - `isLocked` returns information about whether the field is locked
     *                        - `searcherKey` returns the searcher key for each custom field
     */
    public function getFieldsPaginated(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $type = null,
        ?array $id = null,
        ?string $query = null,
        ?string $orderBy = null,
        ?string $expand = null,
    ): Schema\PageBeanField {
        return $this->call(
            uri: '/rest/api/3/field/search',
            method: 'get',
            query: compact('startAt', 'maxResults', 'type', 'id', 'query', 'orderBy', 'expand'),
            success: 200,
            schema: Schema\PageBeanField::class,
        );
    }

    /**
     * Returns a "paginated" list of fields in the trash.
     * The list may be restricted to fields whose field name or description partially match a string
     * 
     * Only custom fields can be queried, `type` must be set to `custom`
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id 
     * @param string $query String used to perform a case-insensitive partial match with field names or descriptions.
     * @param 'name'|'-name'|'+name'|'trashDate'|'-trashDate'|'+trashDate'|'plannedDeletionDate'|'-plannedDeletionDate'|'+plannedDeletionDate'|'projectsCount'|'-projectsCount'|'+projectsCount'|null $expand
     *        
     * @param string $orderBy "Order" the results by a field:
     *                         - `name` sorts by the field name
     *                         - `trashDate` sorts by the date the field was moved to the trash
     *                         - `plannedDeletionDate` sorts by the planned deletion date
     */
    public function getTrashedFieldsPaginated(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $id = null,
        ?string $query = null,
        ?string $expand = null,
        ?string $orderBy = null,
    ): Schema\PageBeanField {
        return $this->call(
            uri: '/rest/api/3/field/search/trashed',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'query', 'expand', 'orderBy'),
            success: 200,
            schema: Schema\PageBeanField::class,
        );
    }

    /**
     * Updates a custom field
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the custom field.
     */
    public function updateCustomField(
        Schema\UpdateCustomFieldDetails $request,
        string $fieldId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}',
            method: 'put',
            body: $request,
            path: compact('fieldId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of the contexts a field is used in.
     * Deprecated, use " Get custom field contexts"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the field to return contexts for.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getContextsForFieldDeprecated(
        string $fieldId,
        ?int $startAt = 0,
        ?int $maxResults = 20,
    ): Schema\PageBeanContext {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/contexts',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanContext::class,
        );
    }

    /**
     * Deletes a custom field.
     * The custom field is deleted whether it is in the trash or not.
     * See "Edit or delete a custom field" for more information on trashing and deleting custom fields
     * 
     * This operation is "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/Z44fOw
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of a custom field.
     */
    public function deleteCustomField(
        string $id,
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/field/{id}',
            method: 'delete',
            path: compact('id'),
            success: 303,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }

    /**
     * Restores a custom field from trash.
     * See "Edit or delete a custom field" for more information on trashing and deleting custom fields
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/Z44fOw
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of a custom field.
     */
    public function restoreCustomField(
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{id}/restore',
            method: 'post',
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Moves a custom field to trash.
     * See "Edit or delete a custom field" for more information on trashing and deleting custom fields
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/Z44fOw
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of a custom field.
     */
    public function trashCustomField(
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/field/{id}/trash',
            method: 'post',
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }
}
