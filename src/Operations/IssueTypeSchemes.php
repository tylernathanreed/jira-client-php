<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueTypeSchemes
{
    /**
     * Returns a "paginated" list of issue type schemes
     * 
     * Only issue type schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $id The list of issue type schemes IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     * @param 'name'|'-name'|'+name'|'id'|'-id'|'+id'|null $orderBy
     *        "Order" the results by a field:
     *         - `name` Sorts by issue type scheme name
     *         - `id` Sorts by issue type scheme ID.
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `projects` For each issue type schemes, returns information about the projects the issue type scheme is assigned to
     *                        - `issueTypes` For each issue type schemes, returns information about the issueTypes the issue type scheme have.
     * @param string $queryString String used to perform a case-insensitive partial match with issue type scheme name.
     */
    public function getAllIssueTypeSchemes(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $id = null,
        ?string $orderBy = 'id',
        ?string $expand = '',
        ?string $queryString = '',
    ): Schema\PageBeanIssueTypeScheme {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'orderBy', 'expand', 'queryString'),
            success: 200,
            schema: Schema\PageBeanIssueTypeScheme::class,
        );
    }

    /**
     * Creates an issue type scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createIssueTypeScheme(
        Schema\IssueTypeSchemeDetails $request,
    ): Schema\IssueTypeSchemeID {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\IssueTypeSchemeID::class,
        );
    }

    /**
     * Returns a "paginated" list of issue type scheme items
     * 
     * Only issue type scheme items used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $issueTypeSchemeId The list of issue type scheme IDs.
     *                                      To include multiple IDs, provide an ampersand-separated list.
     *                                      For example, `issueTypeSchemeId=10000&issueTypeSchemeId=10001`.
     */
    public function getIssueTypeSchemesMapping(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $issueTypeSchemeId = null,
    ): Schema\PageBeanIssueTypeSchemeMapping {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/mapping',
            method: 'get',
            query: compact('startAt', 'maxResults', 'issueTypeSchemeId'),
            success: 200,
            schema: Schema\PageBeanIssueTypeSchemeMapping::class,
        );
    }

    /**
     * Returns a "paginated" list of issue type schemes and, for each issue type scheme, a list of the projects that use it
     * 
     * Only issue type schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param list<int> $projectId The list of project IDs.
     *                             To include multiple project IDs, provide an ampersand-separated list.
     *                             For example, `projectId=10000&projectId=10001`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getIssueTypeSchemeForProjects(
        array $projectId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanIssueTypeSchemeProjects {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/project',
            method: 'get',
            query: compact('projectId', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanIssueTypeSchemeProjects::class,
        );
    }

    /**
     * Assigns an issue type scheme to a project
     * 
     * If any issues in the project are assigned issue types not present in the new scheme, the operation will fail.
     * To complete the assignment those issues must be updated to use issue types in the new scheme
     * 
     * Issue type schemes can only be assigned to classic projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function assignIssueTypeSchemeToProject(
        Schema\IssueTypeSchemeProjectAssociation $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/project',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Updates an issue type scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueTypeSchemeId The ID of the issue type scheme.
     */
    public function updateIssueTypeScheme(
        Schema\IssueTypeSchemeUpdateDetails $request,
        int $issueTypeSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/{issueTypeSchemeId}',
            method: 'put',
            body: $request,
            path: compact('issueTypeSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes an issue type scheme
     * 
     * Only issue type schemes used in classic projects can be deleted
     * 
     * Any projects assigned to the scheme are reassigned to the default issue type scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueTypeSchemeId The ID of the issue type scheme.
     */
    public function deleteIssueTypeScheme(
        int $issueTypeSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/{issueTypeSchemeId}',
            method: 'delete',
            path: compact('issueTypeSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Adds issue types to an issue type scheme
     * 
     * The added issue types are appended to the issue types list
     * 
     * If any of the issue types exist in the issue type scheme, the operation fails and no issue types are added
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueTypeSchemeId The ID of the issue type scheme.
     */
    public function addIssueTypesToIssueTypeScheme(
        Schema\IssueTypeIds $request,
        int $issueTypeSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype',
            method: 'put',
            body: $request,
            path: compact('issueTypeSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Changes the order of issue types in an issue type scheme
     * 
     * The request body parameters must meet the following requirements:
     * 
     *  - all of the issue types must belong to the issue type scheme
     *  - either `after` or `position` must be provided
     *  - the issue type in `after` must not be in the issue type list
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueTypeSchemeId The ID of the issue type scheme.
     */
    public function reorderIssueTypesInIssueTypeScheme(
        Schema\OrderOfIssueTypes $request,
        int $issueTypeSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/move',
            method: 'put',
            body: $request,
            path: compact('issueTypeSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes an issue type from an issue type scheme
     * 
     * This operation cannot remove:
     * 
     *  - any issue type used by issues
     *  - any issue types from the default issue type scheme
     *  - the last standard issue type from an issue type scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $issueTypeSchemeId The ID of the issue type scheme.
     * @param int $issueTypeId The ID of the issue type.
     */
    public function removeIssueTypeFromIssueTypeScheme(
        int $issueTypeSchemeId,
        int $issueTypeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/{issueTypeId}',
            method: 'delete',
            path: compact('issueTypeSchemeId', 'issueTypeId'),
            success: 204,
            schema: true,
        );
    }
}
