<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueResolutions
{
    /**
     * Returns a list of all issue resolution values
     * 
     * **"Permissions" required:** Permission to access Jira.
     */
    public function getResolutions(): true
    {
        return $this->call(
            uri: '/rest/api/3/resolution',
            method: 'get',
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates an issue resolution
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createResolution(
        Schema\CreateResolutionDetails $request,
    ): Schema\ResolutionId {
        return $this->call(
            uri: '/rest/api/3/resolution',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\ResolutionId::class,
        );
    }

    /**
     * Sets default issue resolution
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function setDefaultResolution(
        Schema\SetDefaultResolutionRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/resolution/default',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Changes the order of issue resolutions
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function moveResolutions(
        Schema\ReorderIssueResolutionsRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/resolution/move',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of resolutions.
     * The list can contain all resolutions or a subset determined by any combination of these criteria:
     * 
     *  - a list of resolutions IDs
     *  - whether the field configuration is a default.
     * This returns resolutions from company-managed (classic) projects only, as there is no concept of default resolutions in team-managed projects
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id The list of resolutions IDs to be filtered out
     * @param bool $onlyDefault When set to true, return default only, when IDs provided, if none of them is default, return empty page.
     *                          Default value is false
     */
    public function searchResolutions(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $id = null,
        ?bool $onlyDefault = false,
    ): Schema\PageBeanResolutionJsonBean {
        return $this->call(
            uri: '/rest/api/3/resolution/search',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'onlyDefault'),
            success: 200,
            schema: Schema\PageBeanResolutionJsonBean::class,
        );
    }

    /**
     * Returns an issue resolution value
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $id The ID of the issue resolution value.
     */
    public function getResolution(
        string $id,
    ): Schema\Resolution {
        return $this->call(
            uri: '/rest/api/3/resolution/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\Resolution::class,
        );
    }

    /**
     * Updates an issue resolution
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue resolution.
     */
    public function updateResolution(
        Schema\UpdateResolutionDetails $request,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/resolution/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes an issue resolution
     * 
     * This operation is "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue resolution.
     * @param string $replaceWith The ID of the issue resolution that will replace the currently selected resolution.
     */
    public function deleteResolution(
        string $id,
        string $replaceWith = '',
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/resolution/{id}',
            method: 'delete',
            query: compact('replaceWith'),
            path: compact('id'),
            success: 303,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }
}
