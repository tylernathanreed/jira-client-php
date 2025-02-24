<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueWorklogs
{
    /**
     * Returns worklogs for an issue (ordered by created time), starting from the oldest worklog or from the worklog started on or after a date and time
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Workloads are only returned where the user has:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param int $startedAfter The worklog start date and time, as a UNIX timestamp in milliseconds, after which worklogs are returned.
     * @param int $startedBefore The worklog start date and time, as a UNIX timestamp in milliseconds, before which worklogs are returned.
     * @param string $expand Use "expand" to include additional information about worklogs in the response.
     *                       This parameter accepts`properties`, which returns worklog properties.
     */
    public function getIssueWorklog(
        string $issueIdOrKey,
        ?int $startAt = 0,
        ?int $maxResults = 5000,
        ?int $startedAfter = null,
        ?int $startedBefore = null,
        ?string $expand = '',
    ): Schema\PageOfWorklogs {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog',
            method: 'get',
            query: compact('startAt', 'maxResults', 'startedAfter', 'startedBefore', 'expand'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\PageOfWorklogs::class,
        );
    }

    /**
     * Adds a worklog to an issue
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Work on issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key the issue.
     * @param bool $notifyUsers Whether users watching the issue are notified by email.
     * @param 'new'|'leave'|'manual'|'auto'|null $adjustEstimate
     *        Defines how to update the issue's time estimate, the options are:
     *         - `new` Sets the estimate to a specific value, defined in `newEstimate`
     *         - `leave` Leaves the estimate unchanged
     *         - `manual` Reduces the estimate by amount specified in `reduceBy`
     *         - `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
     * @param string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#).
     *                            For example, *2d*.
     *                            Required when `adjustEstimate` is `new`.
     * @param string $reduceBy The amount to reduce the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m).
     *                         For example, *2d*.
     *                         Required when `adjustEstimate` is `manual`.
     * @param string $expand Use "expand" to include additional information about work logs in the response.
     *                       This parameter accepts `properties`, which returns worklog properties.
     * @param bool $overrideEditableFlag Whether the worklog entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing.
     *                                   For example, the issue is closed.
     *                                   Connect and Forge app users with *Administer Jira* "global permission" can use this flag.
     *                                   @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function addWorklog(
        Schema\Worklog $request,
        string $issueIdOrKey,
        ?bool $notifyUsers = true,
        ?string $adjustEstimate = 'auto',
        ?string $newEstimate = null,
        ?string $reduceBy = null,
        ?string $expand = '',
        ?bool $overrideEditableFlag = false,
    ): Schema\Worklog {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog',
            method: 'post',
            body: $request,
            query: compact('notifyUsers', 'adjustEstimate', 'newEstimate', 'reduceBy', 'expand', 'overrideEditableFlag'),
            path: compact('issueIdOrKey'),
            success: 201,
            schema: Schema\Worklog::class,
        );
    }

    /**
     * Deletes a list of worklogs from an issue.
     * This is an experimental API with limitations:
     * 
     *  - You can't delete more than 5000 worklogs at once
     *  - No notifications will be sent for deleted worklogs
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Delete all worklogs*" project permission" to delete any worklog
     *  - If any worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param 'leave'|'auto'|null $adjustEstimate
     *        Defines how to update the issue's time estimate, the options are:
     *         - `leave` Leaves the estimate unchanged
     *         - `auto` Reduces the estimate by the aggregate value of `timeSpent` across all worklogs being deleted.
     * @param bool $overrideEditableFlag Whether the work log entries should be removed to the issue even if the issue is not editable, because jira.issue.editable set to false or missing.
     *                                   For example, the issue is closed.
     *                                   Connect and Forge app users with admin permission can use this flag.
     */
    public function bulkDeleteWorklogs(
        Schema\WorklogIdsRequestBean $request,
        string $issueIdOrKey,
        ?string $adjustEstimate = 'auto',
        ?bool $overrideEditableFlag = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog',
            method: 'delete',
            body: $request,
            query: compact('adjustEstimate', 'overrideEditableFlag'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Moves a list of worklogs from one issue to another.
     * This is an experimental API with several limitations:
     * 
     *  - You can't move more than 5000 worklogs at once
     *  - You can't move worklogs containing an attachment
     *  - You can't move worklogs restricted by project roles
     *  - No notifications will be sent for moved worklogs
     *  - No webhooks or events will be sent for moved worklogs
     *  - No issue history will be recorded for moved worklogs
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the projects containing the source and destination issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Delete all worklogs*" and *Edit all worklogs*""project permission"
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey 
     * @param 'leave'|'auto'|null $adjustEstimate
     *        Defines how to update the issues' time estimate, the options are:
     *         - `leave` Leaves the estimate unchanged
     *         - `auto` Reduces the estimate by the aggregate value of `timeSpent` across all worklogs being moved in the source issue, and increases it in the destination issue.
     * @param bool $overrideEditableFlag Whether the work log entry should be moved to and from the issues even if the issues are not editable, because jira.issue.editable set to false or missing.
     *                                   For example, the issue is closed.
     *                                   Connect and Forge app users with admin permission can use this flag.
     */
    public function bulkMoveWorklogs(
        Schema\WorklogsMoveRequestBean $request,
        string $issueIdOrKey,
        ?string $adjustEstimate = 'auto',
        ?bool $overrideEditableFlag = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/move',
            method: 'post',
            body: $request,
            query: compact('adjustEstimate', 'overrideEditableFlag'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a worklog
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the worklog.
     * @param string $expand Use "expand" to include additional information about work logs in the response.
     *                       This parameter accepts
     *                       `properties`, which returns worklog properties.
     */
    public function getWorklog(
        string $issueIdOrKey,
        string $id,
        ?string $expand = '',
    ): Schema\Worklog {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}',
            method: 'get',
            query: compact('expand'),
            path: compact('issueIdOrKey', 'id'),
            success: 200,
            schema: Schema\Worklog::class,
        );
    }

    /**
     * Updates a worklog
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Edit all worklogs*" project permission" to update any worklog or *Edit own worklogs* to update worklogs created by the user
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key the issue.
     * @param string $id The ID of the worklog.
     * @param bool $notifyUsers Whether users watching the issue are notified by email.
     * @param 'new'|'leave'|'manual'|'auto'|null $adjustEstimate
     *        Defines how to update the issue's time estimate, the options are:
     *         - `new` Sets the estimate to a specific value, defined in `newEstimate`
     *         - `leave` Leaves the estimate unchanged
     *         - `auto` Updates the estimate by the difference between the original and updated value of `timeSpent` or `timeSpentSeconds`.
     * @param string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#).
     *                            For example, *2d*.
     *                            Required when `adjustEstimate` is `new`.
     * @param string $expand Use "expand" to include additional information about worklogs in the response.
     *                       This parameter accepts `properties`, which returns worklog properties.
     * @param bool $overrideEditableFlag Whether the worklog should be added to the issue even if the issue is not editable.
     *                                   For example, because the issue is closed.
     *                                   Connect and Forge app users with *Administer Jira* "global permission" can use this flag.
     *                                   @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function updateWorklog(
        Schema\Worklog $request,
        string $issueIdOrKey,
        string $id,
        ?bool $notifyUsers = true,
        ?string $adjustEstimate = 'auto',
        ?string $newEstimate = null,
        ?string $expand = '',
        ?bool $overrideEditableFlag = false,
    ): Schema\Worklog {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}',
            method: 'put',
            body: $request,
            query: compact('notifyUsers', 'adjustEstimate', 'newEstimate', 'expand', 'overrideEditableFlag'),
            path: compact('issueIdOrKey', 'id'),
            success: 200,
            schema: Schema\Worklog::class,
        );
    }

    /**
     * Deletes a worklog from an issue
     * 
     * Time tracking must be enabled in Jira, otherwise this operation returns an error.
     * For more information, see "Configuring time tracking"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Delete all worklogs*" project permission" to delete any worklog or *Delete own worklogs* to delete worklogs created by the user,
     *  - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the worklog.
     * @param bool $notifyUsers Whether users watching the issue are notified by email.
     * @param 'new'|'leave'|'manual'|'auto'|null $adjustEstimate
     *        Defines how to update the issue's time estimate, the options are:
     *         - `new` Sets the estimate to a specific value, defined in `newEstimate`
     *         - `leave` Leaves the estimate unchanged
     *         - `manual` Increases the estimate by amount specified in `increaseBy`
     *         - `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
     * @param string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#).
     *                            For example, *2d*.
     *                            Required when `adjustEstimate` is `new`.
     * @param string $increaseBy The amount to increase the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m or \#).
     *                           For example, *2d*.
     *                           Required when `adjustEstimate` is `manual`.
     * @param bool $overrideEditableFlag Whether the work log entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing.
     *                                   For example, the issue is closed.
     *                                   Connect and Forge app users with admin permission can use this flag.
     */
    public function deleteWorklog(
        string $issueIdOrKey,
        string $id,
        ?bool $notifyUsers = true,
        ?string $adjustEstimate = 'auto',
        ?string $newEstimate = null,
        ?string $increaseBy = null,
        ?bool $overrideEditableFlag = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}',
            method: 'delete',
            query: compact('notifyUsers', 'adjustEstimate', 'newEstimate', 'increaseBy', 'overrideEditableFlag'),
            path: compact('issueIdOrKey', 'id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a list of IDs and delete timestamps for worklogs deleted after a date and time
     * 
     * This resource is paginated, with a limit of 1000 worklogs per page.
     * Each page lists worklogs from oldest to youngest.
     * If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page.
     * Also, `nextPage` provides the URL for the next page of worklogs.
     * The `lastPage` parameter is set to true on the last page of worklogs
     * 
     * This resource does not return worklogs deleted during the minute preceding the request
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $since The date and time, as a UNIX timestamp in milliseconds, after which deleted worklogs are returned.
     */
    public function getIdsOfWorklogsDeletedSince(
        ?int $since = 0,
    ): Schema\ChangedWorklogs {
        return $this->call(
            uri: '/rest/api/3/worklog/deleted',
            method: 'get',
            query: compact('since'),
            success: 200,
            schema: Schema\ChangedWorklogs::class,
        );
    }

    /**
     * Returns worklog details for a list of worklog IDs
     * 
     * The returned list of worklogs is limited to 1000 items
     * 
     * **"Permissions" required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:
     * 
     *  - the worklog is set as *Viewable by All Users*
     *  - the user is a member of a project role or group with permission to view the worklog.
     * 
     * @param string $expand Use "expand" to include additional information about worklogs in the response.
     *                       This parameter accepts `properties` that returns the properties of each worklog.
     */
    public function getWorklogsForIds(
        Schema\WorklogIdsRequestBean $request,
        ?string $expand = '',
    ): true {
        return $this->call(
            uri: '/rest/api/3/worklog/list',
            method: 'post',
            body: $request,
            query: compact('expand'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of IDs and update timestamps for worklogs updated after a date and time
     * 
     * This resource is paginated, with a limit of 1000 worklogs per page.
     * Each page lists worklogs from oldest to youngest.
     * If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page.
     * Also, `nextPage` provides the URL for the next page of worklogs.
     * The `lastPage` parameter is set to true on the last page of worklogs
     * 
     * This resource does not return worklogs updated during the minute preceding the request
     * 
     * **"Permissions" required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:
     * 
     *  - the worklog is set as *Viewable by All Users*
     *  - the user is a member of a project role or group with permission to view the worklog.
     * 
     * @param int $since The date and time, as a UNIX timestamp in milliseconds, after which updated worklogs are returned.
     * @param string $expand Use "expand" to include additional information about worklogs in the response.
     *                       This parameter accepts `properties` that returns the properties of each worklog.
     */
    public function getIdsOfWorklogsModifiedSince(
        ?int $since = 0,
        ?string $expand = '',
    ): Schema\ChangedWorklogs {
        return $this->call(
            uri: '/rest/api/3/worklog/updated',
            method: 'get',
            query: compact('since', 'expand'),
            success: 200,
            schema: Schema\ChangedWorklogs::class,
        );
    }
}
