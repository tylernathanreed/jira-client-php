<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueFieldConfigurations
{
    /**
     * Returns a "paginated" list of field configurations.
     * The list can be for all field configurations or a subset determined by any combination of these criteria:
     * 
     *  - a list of field configuration item IDs
     *  - whether the field configuration is a default
     *  - whether the field configuration name or description contains a query string
     * 
     * Only field configurations used in company-managed (classic) projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $id The list of field configuration IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     * @param bool $isDefault If *true* returns default field configurations only.
     * @param string $query The query string used to match against field configuration names and descriptions.
     */
    public function getAllFieldConfigurations(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $id = null,
        ?bool $isDefault = false,
        ?string $query = '',
    ): Schema\PageBeanFieldConfigurationDetails {
        return $this->call(
            uri: '/rest/api/3/fieldconfiguration',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'isDefault', 'query'),
            success: 200,
            schema: Schema\PageBeanFieldConfigurationDetails::class,
        );
    }

    /**
     * Creates a field configuration.
     * The field configuration is created with the same field properties as the default configuration, with all the fields being optional
     * 
     * This operation can only create configurations for use in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createFieldConfiguration(
        Schema\FieldConfigurationDetails $request,
    ): Schema\FieldConfiguration {
        return $this->call(
            uri: '/rest/api/3/fieldconfiguration',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\FieldConfiguration::class,
        );
    }

    /**
     * Updates a field configuration.
     * The name and the description provided in the request override the existing values
     * 
     * This operation can only update configurations used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration.
     */
    public function updateFieldConfiguration(
        Schema\FieldConfigurationDetails $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfiguration/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a field configuration
     * 
     * This operation can only delete configurations used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration.
     */
    public function deleteFieldConfiguration(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfiguration/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of all fields for a configuration
     * 
     * Only the fields from configurations used in company-managed (classic) projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getFieldConfigurationItems(
        int $id,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanFieldConfigurationItem {
        return $this->call(
            uri: '/rest/api/3/fieldconfiguration/{id}/fields',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('id'),
            success: 200,
            schema: Schema\PageBeanFieldConfigurationItem::class,
        );
    }

    /**
     * Updates fields in a field configuration.
     * The properties of the field configuration fields provided override the existing values
     * 
     * This operation can only update field configurations used in company-managed (classic) projects
     * 
     * The operation can set the renderer for text fields to the default text renderer (`text-renderer`) or wiki style renderer (`wiki-renderer`).
     * However, the renderer cannot be updated for fields using the autocomplete renderer (`autocomplete-renderer`)
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration.
     */
    public function updateFieldConfigurationItems(
        Schema\FieldConfigurationItemsDetails $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfiguration/{id}/fields',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of field configuration schemes
     * 
     * Only field configuration schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $id The list of field configuration scheme IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     */
    public function getAllFieldConfigurationSchemes(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $id = null,
    ): Schema\PageBeanFieldConfigurationScheme {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id'),
            success: 200,
            schema: Schema\PageBeanFieldConfigurationScheme::class,
        );
    }

    /**
     * Creates a field configuration scheme
     * 
     * This operation can only create field configuration schemes used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createFieldConfigurationScheme(
        Schema\UpdateFieldConfigurationSchemeDetails $request,
    ): Schema\FieldConfigurationScheme {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\FieldConfigurationScheme::class,
        );
    }

    /**
     * Returns a "paginated" list of field configuration issue type items
     * 
     * Only items used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $fieldConfigurationSchemeId The list of field configuration scheme IDs.
     *                                               To include multiple field configuration schemes separate IDs with ampersand: `fieldConfigurationSchemeId=10000&fieldConfigurationSchemeId=10001`.
     */
    public function getFieldConfigurationSchemeMappings(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $fieldConfigurationSchemeId = null,
    ): Schema\PageBeanFieldConfigurationIssueTypeItem {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/mapping',
            method: 'get',
            query: compact('startAt', 'maxResults', 'fieldConfigurationSchemeId'),
            success: 200,
            schema: Schema\PageBeanFieldConfigurationIssueTypeItem::class,
        );
    }

    /**
     * Returns a "paginated" list of field configuration schemes and, for each scheme, a list of the projects that use it
     * 
     * The list is sorted by field configuration scheme ID.
     * The first item contains the list of project IDs assigned to the default field configuration scheme
     * 
     * Only field configuration schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param list<int> $projectId The list of project IDs.
     *                             To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getFieldConfigurationSchemeProjectMapping(
        array $projectId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanFieldConfigurationSchemeProjects {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/project',
            method: 'get',
            query: compact('projectId', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanFieldConfigurationSchemeProjects::class,
        );
    }

    /**
     * Assigns a field configuration scheme to a project.
     * If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme
     * 
     * Field configuration schemes can only be assigned to classic projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function assignFieldConfigurationSchemeToProject(
        Schema\FieldConfigurationSchemeProjectAssociation $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/project',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Updates a field configuration scheme
     * 
     * This operation can only update field configuration schemes used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration scheme.
     */
    public function updateFieldConfigurationScheme(
        Schema\UpdateFieldConfigurationSchemeDetails $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a field configuration scheme
     * 
     * This operation can only delete field configuration schemes used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration scheme.
     */
    public function deleteFieldConfigurationScheme(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Assigns issue types to field configurations on field configuration scheme
     * 
     * This operation can only modify field configuration schemes used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration scheme.
     */
    public function setFieldConfigurationSchemeMapping(
        Schema\AssociateFieldConfigurationsWithIssueTypesRequest $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/{id}/mapping',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes issue types from the field configuration scheme
     * 
     * This operation can only modify field configuration schemes used in company-managed (classic) projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the field configuration scheme.
     */
    public function removeIssueTypesFromGlobalFieldConfigurationScheme(
        Schema\IssueTypeIdsToRemove $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/fieldconfigurationscheme/{id}/mapping/delete',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }
}
