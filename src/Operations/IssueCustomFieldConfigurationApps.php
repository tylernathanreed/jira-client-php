<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueCustomFieldConfigurationApps
{
    /**
     * Returns a "paginated" list of configurations for list of custom fields of a "type" created by a "Forge app"
     * 
     * The result can be filtered by one of these criteria:
     * 
     *  - `id`
     *  - `fieldContextId`
     *  - `issueId`
     *  - `projectKeyOrId` and `issueTypeId`
     * 
     * Otherwise, all configurations for the provided list of custom fields are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the Forge app that provided the custom field type.
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
     * @link https://developer.atlassian.com/platform/forge/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param ?list<int> $id The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
     * @param ?list<int> $fieldContextId The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
     * @param int $issueId The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`.
     * @param string $projectKeyOrId The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`.
     * @param string $issueTypeId The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getCustomFieldsConfigurations(
        Schema\ConfigurationsListParameters $request,
        ?array $id = null,
        ?array $fieldContextId = null,
        ?int $issueId = null,
        ?string $projectKeyOrId = null,
        ?string $issueTypeId = null,
        ?int $startAt = 0,
        ?int $maxResults = 100,
    ): Schema\PageBeanBulkContextualConfiguration {
        return $this->call(
            uri: '/rest/api/3/app/field/context/configuration/list',
            method: 'post',
            body: $request,
            query: compact('id', 'fieldContextId', 'issueId', 'projectKeyOrId', 'issueTypeId', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanBulkContextualConfiguration::class,
        );
    }

    /**
     * Returns a "paginated" list of configurations for a custom field of a "type" created by a "Forge app"
     * 
     * The result can be filtered by one of these criteria:
     * 
     *  - `id`
     *  - `fieldContextId`
     *  - `issueId`
     *  - `projectKeyOrId` and `issueTypeId`
     * 
     * Otherwise, all configurations are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the Forge app that provided the custom field type.
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
     * @link https://developer.atlassian.com/platform/forge/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldIdOrKey The ID or key of the custom field, for example `customfield_10000`.
     * @param ?list<int> $id The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
     * @param ?list<int> $fieldContextId The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
     * @param int $issueId The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`.
     * @param string $projectKeyOrId The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`.
     * @param string $issueTypeId The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getCustomFieldConfiguration(
        string $fieldIdOrKey,
        ?array $id = null,
        ?array $fieldContextId = null,
        ?int $issueId = null,
        ?string $projectKeyOrId = null,
        ?string $issueTypeId = null,
        ?int $startAt = 0,
        ?int $maxResults = 100,
    ): Schema\PageBeanContextualConfiguration {
        return $this->call(
            uri: '/rest/api/3/app/field/{fieldIdOrKey}/context/configuration',
            method: 'get',
            query: compact('id', 'fieldContextId', 'issueId', 'projectKeyOrId', 'issueTypeId', 'startAt', 'maxResults'),
            path: compact('fieldIdOrKey'),
            success: 200,
            schema: Schema\PageBeanContextualConfiguration::class,
        );
    }

    /**
     * Update the configuration for contexts of a custom field of a "type" created by a "Forge app"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * Jira permissions are not required for the Forge app that created the custom field type.
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
     * @link https://developer.atlassian.com/platform/forge/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldIdOrKey The ID or key of the custom field, for example `customfield_10000`.
     */
    public function updateCustomFieldConfiguration(
        Schema\CustomFieldConfigurations $request,
        string $fieldIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/app/field/{fieldIdOrKey}/context/configuration',
            method: 'put',
            body: $request,
            path: compact('fieldIdOrKey'),
            success: 200,
            schema: true,
        );
    }
}
