<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueTypeScreenSchemes
{
    /**
     * Returns a "paginated" list of issue type screen schemes
     * 
     * Only issue type screen schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $id The list of issue type screen scheme IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     * @param string $queryString String used to perform a case-insensitive partial match with issue type screen scheme name.
     * @param 'name'|'-name'|'+name'|'id'|'-id'|'+id'|null $orderBy
     *        "Order" the results by a field:
     *         - `name` Sorts by issue type screen scheme name
     *         - `id` Sorts by issue type screen scheme ID.
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts `projects` that, for each issue type screen schemes, returns information about the projects the issue type screen scheme is assigned to.
     */
    public function getIssueTypeScreenSchemes(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $id = null,
        ?string $queryString = '',
        ?string $orderBy = 'id',
        ?string $expand = '',
    ): Schema\PageBeanIssueTypeScreenScheme {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'queryString', 'orderBy', 'expand'),
            success: 200,
            schema: Schema\PageBeanIssueTypeScreenScheme::class,
        );
    }

    /**
     * Creates an issue type screen scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createIssueTypeScreenScheme(
        Schema\IssueTypeScreenSchemeDetails $request,
    ): Schema\IssueTypeScreenSchemeId {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\IssueTypeScreenSchemeId::class,
        );
    }

    /**
     * Returns a "paginated" list of issue type screen scheme items
     * 
     * Only issue type screen schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $issueTypeScreenSchemeId The list of issue type screen scheme IDs.
     *                                            To include multiple issue type screen schemes, separate IDs with ampersand: `issueTypeScreenSchemeId=10000&issueTypeScreenSchemeId=10001`.
     */
    public function getIssueTypeScreenSchemeMappings(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $issueTypeScreenSchemeId = null,
    ): Schema\PageBeanIssueTypeScreenSchemeItem {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/mapping',
            method: 'get',
            query: compact('startAt', 'maxResults', 'issueTypeScreenSchemeId'),
            success: 200,
            schema: Schema\PageBeanIssueTypeScreenSchemeItem::class,
        );
    }

    /**
     * Returns a "paginated" list of issue type screen schemes and, for each issue type screen scheme, a list of the projects that use it
     * 
     * Only issue type screen schemes used in classic projects are returned
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
    public function getIssueTypeScreenSchemeProjectAssociations(
        array $projectId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanIssueTypeScreenSchemesProjects {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/project',
            method: 'get',
            query: compact('projectId', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanIssueTypeScreenSchemesProjects::class,
        );
    }

    /**
     * Assigns an issue type screen scheme to a project
     * 
     * Issue type screen schemes can only be assigned to classic projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function assignIssueTypeScreenSchemeToProject(
        Schema\IssueTypeScreenSchemeProjectAssociation $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/project',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Updates an issue type screen scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     */
    public function updateIssueTypeScreenScheme(
        Schema\IssueTypeScreenSchemeUpdateDetails $request,
        string $issueTypeScreenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}',
            method: 'put',
            body: $request,
            path: compact('issueTypeScreenSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes an issue type screen scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     */
    public function deleteIssueTypeScreenScheme(
        string $issueTypeScreenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}',
            method: 'delete',
            path: compact('issueTypeScreenSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Appends issue type to screen scheme mappings to an issue type screen scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     */
    public function appendMappingsForIssueTypeScreenScheme(
        Schema\IssueTypeScreenSchemeMappingDetails $request,
        string $issueTypeScreenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping',
            method: 'put',
            body: $request,
            path: compact('issueTypeScreenSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Updates the default screen scheme of an issue type screen scheme.
     * The default screen scheme is used for all unmapped issue types
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     */
    public function updateDefaultScreenScheme(
        Schema\UpdateDefaultScreenScheme $request,
        string $issueTypeScreenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping/default',
            method: 'put',
            body: $request,
            path: compact('issueTypeScreenSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes issue type to screen scheme mappings from an issue type screen scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     */
    public function removeMappingsFromIssueTypeScreenScheme(
        Schema\IssueTypeIds $request,
        string $issueTypeScreenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping/remove',
            method: 'post',
            body: $request,
            path: compact('issueTypeScreenSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of projects associated with an issue type screen scheme
     * 
     * Only company-managed projects associated with an issue type screen scheme are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $query 
     */
    public function getProjectsForIssueTypeScreenScheme(
        int $issueTypeScreenSchemeId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $query = '',
    ): Schema\PageBeanProjectDetails {
        return $this->call(
            uri: '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/project',
            method: 'get',
            query: compact('startAt', 'maxResults', 'query'),
            path: compact('issueTypeScreenSchemeId'),
            success: 200,
            schema: Schema\PageBeanProjectDetails::class,
        );
    }
}
