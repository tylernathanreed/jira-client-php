<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait PrioritySchemes
{
    /**
     * Returns a "paginated" list of priority schemes
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<int> $priorityId A set of priority IDs to filter by.
     *                               To include multiple IDs, provide an ampersand-separated list.
     *                               For example, `priorityId=10000&priorityId=10001`.
     * @param ?list<int> $schemeId A set of priority scheme IDs.
     *                             To include multiple IDs, provide an ampersand-separated list.
     *                             For example, `schemeId=10000&schemeId=10001`.
     * @param string $schemeName The name of scheme to search for.
     * @param bool $onlyDefault Whether only the default priority is returned.
     * @param 'name'|'+name'|'-name'|null $orderBy
     *        The ordering to return the priority schemes by.
     * @param string $expand A comma separated list of additional information to return.
     *                       "priorities" will return priorities associated with the priority scheme.
     *                       "projects" will return projects associated with the priority scheme.
     *                       `expand=priorities,projects`.
     */
    public function getPrioritySchemes(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $priorityId = null,
        ?array $schemeId = null,
        ?string $schemeName = '',
        ?bool $onlyDefault = false,
        ?string $orderBy = '+name',
        ?string $expand = null,
    ): Schema\PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects {
        return $this->call(
            uri: '/rest/api/3/priorityscheme',
            method: 'get',
            query: compact('startAt', 'maxResults', 'priorityId', 'schemeId', 'schemeName', 'onlyDefault', 'orderBy', 'expand'),
            success: 200,
            schema: Schema\PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects::class,
        );
    }

    /**
     * Creates a new priority scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createPriorityScheme(
        Schema\CreatePrioritySchemeDetails $request,
    ): Schema\PrioritySchemeId {
        return $this->call(
            uri: '/rest/api/3/priorityscheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\PrioritySchemeId::class,
        );
    }

    /**
     * Returns a "paginated" list of priorities that would require mapping, given a change in priorities or projects associated with a priority scheme
     * 
     * **"Permissions" required:** Permission to access Jira.
     */
    public function suggestedPrioritiesForMappings(
        Schema\SuggestedMappingsRequestBean $request,
    ): Schema\PageBeanPriorityWithSequence {
        return $this->call(
            uri: '/rest/api/3/priorityscheme/mappings',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\PageBeanPriorityWithSequence::class,
        );
    }

    /**
     * Returns a "paginated" list of priorities available for adding to a priority scheme
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $schemeId The priority scheme ID.
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param string $query The string to query priorities on by name.
     * @param ?list<string> $exclude A list of priority IDs to exclude from the results.
     */
    public function getAvailablePrioritiesByPriorityScheme(
        string $schemeId,
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?string $query = '',
        ?array $exclude = null,
    ): Schema\PageBeanPriorityWithSequence {
        return $this->call(
            uri: '/rest/api/3/priorityscheme/priorities/available',
            method: 'get',
            query: compact('schemeId', 'startAt', 'maxResults', 'query', 'exclude'),
            success: 200,
            schema: Schema\PageBeanPriorityWithSequence::class,
        );
    }

    /**
     * Updates a priority scheme.
     * This includes its details, the lists of priorities and projects in it
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $schemeId The ID of the priority scheme.
     */
    public function updatePriorityScheme(
        Schema\UpdatePrioritySchemeRequestBean $request,
        int $schemeId,
    ): Schema\UpdatePrioritySchemeResponseBean {
        return $this->call(
            uri: '/rest/api/3/priorityscheme/{schemeId}',
            method: 'put',
            body: $request,
            path: compact('schemeId'),
            success: 202,
            schema: Schema\UpdatePrioritySchemeResponseBean::class,
        );
    }

    /**
     * Deletes a priority scheme
     * 
     * This operation is only available for priority schemes without any associated projects.
     * Any associated projects must be removed from the priority scheme before this operation can be performed
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $schemeId The priority scheme ID.
     */
    public function deletePriorityScheme(
        int $schemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/priorityscheme/{schemeId}',
            method: 'delete',
            path: compact('schemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of priorities by scheme
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $schemeId The priority scheme ID.
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     */
    public function getPrioritiesByPriorityScheme(
        string $schemeId,
        ?string $startAt = '0',
        ?string $maxResults = '50',
    ): Schema\PageBeanPriorityWithSequence {
        return $this->call(
            uri: '/rest/api/3/priorityscheme/{schemeId}/priorities',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('schemeId'),
            success: 200,
            schema: Schema\PageBeanPriorityWithSequence::class,
        );
    }

    /**
     * Returns a "paginated" list of projects by scheme
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $schemeId The priority scheme ID.
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<int> $projectId The project IDs to filter by.
     *                              For example, `projectId=10000&projectId=10001`.
     * @param string $query The string to query projects on by name.
     */
    public function getProjectsByPriorityScheme(
        string $schemeId,
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $projectId = null,
        ?string $query = '',
    ): Schema\PageBeanProject {
        return $this->call(
            uri: '/rest/api/3/priorityscheme/{schemeId}/projects',
            method: 'get',
            query: compact('startAt', 'maxResults', 'projectId', 'query'),
            path: compact('schemeId'),
            success: 200,
            schema: Schema\PageBeanProject::class,
        );
    }
}
