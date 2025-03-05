<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Status
{
    /**
     * Returns a list of the statuses specified by one or more status IDs
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission."
     *  - *Administer Jira* "project permission."
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param list<string> $id The list of status IDs.
     *                         To include multiple IDs, provide an ampersand-separated list.
     *                         For example, id=10000&id=10001
     *                         Min items `1`, Max items `50`
     * @param string $expand Deprecated.
     *                       See the "deprecation notice" for details
     *                       Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `usages` Returns the project and issue types that use the status in their workflow
     *                        - `workflowUsages` Returns the workflows that use the status.
     *                       @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
     * 
     * @return list<Schema\JiraStatus>
     */
    public function getStatusesById(
        array $id,
        ?string $expand = null,
    ): array {
        return $this->call(
            uri: '/rest/api/3/statuses',
            method: 'get',
            query: compact('id', 'expand'),
            success: 200,
            schema: [Schema\JiraStatus::class],
        );
    }

    /**
     * Updates statuses by ID
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission."
     *  - *Administer Jira* "project permission."
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     */
    public function updateStatuses(
        Schema\StatusUpdateRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/statuses',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Creates statuses for a global or project scope
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission."
     *  - *Administer Jira* "project permission."
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @return list<Schema\JiraStatus>
     */
    public function createStatuses(
        Schema\StatusCreateRequest $request,
    ): array {
        return $this->call(
            uri: '/rest/api/3/statuses',
            method: 'post',
            body: $request,
            success: 200,
            schema: [Schema\JiraStatus::class],
        );
    }

    /**
     * Deletes statuses by ID
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission."
     *  - *Administer Jira* "project permission."
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param list<string> $id The list of status IDs.
     *                         To include multiple IDs, provide an ampersand-separated list.
     *                         For example, id=10000&id=10001
     *                         Min items `1`, Max items `50`
     */
    public function deleteStatusesById(
        array $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/statuses',
            method: 'delete',
            query: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of statuses that match a search on name or project
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer projects* "project permission."
     *  - *Administer Jira* "project permission."
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#pagination
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $expand Deprecated.
     *                       See the "deprecation notice" for details
     *                       Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `usages` Returns the project and issue types that use the status in their workflow
     *                        - `workflowUsages` Returns the workflows that use the status.
     *                       @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
     * @param string $projectId The project the status is part of or null for global statuses.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $searchString Term to match status names against or null to search for all statuses in the search scope.
     * @param string $statusCategory Category of the status to filter by.
     *                               The supported values are: `TODO`, `IN_PROGRESS`, and `DONE`.
     */
    public function search(
        ?string $expand = null,
        ?string $projectId = null,
        ?int $startAt = 0,
        ?int $maxResults = 200,
        ?string $searchString = null,
        ?string $statusCategory = null,
    ): Schema\PageOfStatuses {
        return $this->call(
            uri: '/rest/api/3/statuses/search',
            method: 'get',
            query: compact('expand', 'projectId', 'startAt', 'maxResults', 'searchString', 'statusCategory'),
            success: 200,
            schema: Schema\PageOfStatuses::class,
        );
    }

    /**
     * Returns a page of issue types in a project using a given status.
     * 
     * @param string $statusId The statusId to fetch issue type usages for
     * @param string $projectId The projectId to fetch issue type usages for
     * @param string $nextPageToken The cursor for pagination
     * @param int $maxResults The maximum number of results to return.
     *                        Must be an integer between 1 and 200.
     */
    public function getProjectIssueTypeUsagesForStatus(
        string $statusId,
        string $projectId,
        ?string $nextPageToken = null,
        ?int $maxResults = 50,
    ): Schema\StatusProjectIssueTypeUsageDTO {
        return $this->call(
            uri: '/rest/api/3/statuses/{statusId}/project/{projectId}/issueTypeUsages',
            method: 'get',
            query: compact('nextPageToken', 'maxResults'),
            path: compact('statusId', 'projectId'),
            success: 200,
            schema: Schema\StatusProjectIssueTypeUsageDTO::class,
        );
    }

    /**
     * Returns a page of projects using a given status.
     * 
     * @param string $statusId The statusId to fetch project usages for
     * @param string $nextPageToken The cursor for pagination
     * @param int $maxResults The maximum number of results to return.
     *                        Must be an integer between 1 and 200.
     */
    public function getProjectUsagesForStatus(
        string $statusId,
        ?string $nextPageToken = null,
        ?int $maxResults = 50,
    ): Schema\StatusProjectUsageDTO {
        return $this->call(
            uri: '/rest/api/3/statuses/{statusId}/projectUsages',
            method: 'get',
            query: compact('nextPageToken', 'maxResults'),
            path: compact('statusId'),
            success: 200,
            schema: Schema\StatusProjectUsageDTO::class,
        );
    }

    /**
     * Returns a page of workflows using a given status.
     * 
     * @param string $statusId The statusId to fetch workflow usages for
     * @param string $nextPageToken The cursor for pagination
     * @param int $maxResults The maximum number of results to return.
     *                        Must be an integer between 1 and 200.
     */
    public function getWorkflowUsagesForStatus(
        string $statusId,
        ?string $nextPageToken = null,
        ?int $maxResults = 50,
    ): Schema\StatusWorkflowUsageDTO {
        return $this->call(
            uri: '/rest/api/3/statuses/{statusId}/workflowUsages',
            method: 'get',
            query: compact('nextPageToken', 'maxResults'),
            path: compact('statusId'),
            success: 200,
            schema: Schema\StatusWorkflowUsageDTO::class,
        );
    }
}
