<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssuePriorities
{
    /**
     * Returns the list of all issue priorities
     * 
     * **"Permissions" required:** Permission to access Jira.
     */
    public function getPriorities(): true
    {
        return $this->call(
            uri: '/rest/api/3/priority',
            method: 'get',
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates an issue priority
     * 
     * Deprecation applies to iconUrl param in request body which will be sunset on 16th Mar 2025.
     * For more details refer to "changelog"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/changelog/#CHANGE-1525
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createPriority(
        Schema\CreatePriorityDetails $request,
    ): Schema\PriorityId {
        return $this->call(
            uri: '/rest/api/3/priority',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\PriorityId::class,
        );
    }

    /**
     * Sets default issue priority
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function setDefaultPriority(
        Schema\SetDefaultPriorityRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/priority/default',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Changes the order of issue priorities
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function movePriorities(
        Schema\ReorderIssuePriorities $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/priority/move',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of priorities.
     * The list can contain all priorities or a subset determined by any combination of these criteria:
     * 
     *  - a list of priority IDs.
     * Any invalid priority IDs are ignored
     *  - a list of project IDs.
     * Only priorities that are available in these projects will be returned.
     * Any invalid project IDs are ignored
     *  - whether the field configuration is a default.
     * This returns priorities from company-managed (classic) projects only, as there is no concept of default priorities in team-managed projects
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id The list of priority IDs.
     *                          To include multiple IDs, provide an ampersand-separated list.
     *                          For example, `id=2&id=3`.
     * @param ?list<string> $projectId The list of projects IDs.
     *                                 To include multiple IDs, provide an ampersand-separated list.
     *                                 For example, `projectId=10010&projectId=10111`.
     * @param string $priorityName The name of priority to search for.
     * @param bool $onlyDefault Whether only the default priority is returned.
     * @param string $expand Use `schemes` to return the associated priority schemes for each priority.
     *                       Limited to returning first 15 priority schemes per priority.
     */
    public function searchPriorities(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $id = null,
        ?array $projectId = null,
        ?string $priorityName = '',
        ?bool $onlyDefault = false,
        ?string $expand = '',
    ): Schema\PageBeanPriority {
        return $this->call(
            uri: '/rest/api/3/priority/search',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'projectId', 'priorityName', 'onlyDefault', 'expand'),
            success: 200,
            schema: Schema\PageBeanPriority::class,
        );
    }

    /**
     * Returns an issue priority
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $id The ID of the issue priority.
     */
    public function getPriority(
        string $id,
    ): Schema\Priority {
        return $this->call(
            uri: '/rest/api/3/priority/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\Priority::class,
        );
    }

    /**
     * Updates an issue priority
     * 
     * At least one request body parameter must be defined
     * 
     * Deprecation applies to iconUrl param in request body which will be sunset on 16th Mar 2025.
     * For more details refer to "changelog"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/changelog/#CHANGE-1525
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue priority.
     */
    public function updatePriority(
        Schema\UpdatePriorityDetails $request,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/priority/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes an issue priority
     * 
     * This operation is "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue priority.
     */
    public function deletePriority(
        string $id,
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/priority/{id}',
            method: 'delete',
            path: compact('id'),
            success: 303,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }
}
