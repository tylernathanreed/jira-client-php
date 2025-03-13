<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueBulkOperations
{
    /**
     * Use this API to submit a bulk delete request.
     * You can delete up to 1,000 issues in a single operation
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Delete "issues permission" in all projects that contain the selected issues
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/#Delete-issues/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function submitBulkDelete(
        Schema\IssueBulkDeletePayload $request,
    ): Schema\SubmittedBulkOperation {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/delete',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SubmittedBulkOperation::class,
        );
    }

    /**
     * Use this API to get a list of fields visible to the user to perform bulk edit operations.
     * You can pass single or multiple issues in the query to get eligible editable fields.
     * This API uses pagination to return responses, delivering 50 fields at a time
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - Depending on the field, any field-specific permissions required to edit it.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdsOrKeys The IDs or keys of the issues to get editable fields from.
     * @param string $searchText (Optional)The text to search for in the editable fields.
     * @param string $endingBefore (Optional)The end cursor for use in pagination.
     * @param string $startingAfter (Optional)The start cursor for use in pagination.
     */
    public function getBulkEditableFields(
        string $issueIdsOrKeys,
        ?string $searchText = null,
        ?string $endingBefore = null,
        ?string $startingAfter = null,
    ): Schema\BulkEditGetFields {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/fields',
            method: 'get',
            query: compact('issueIdsOrKeys', 'searchText', 'endingBefore', 'startingAfter'),
            success: 200,
            schema: Schema\BulkEditGetFields::class,
        );
    }

    /**
     * Use this API to submit a bulk edit request and simultaneously edit multiple issues.
     * There are limits applied to the number of issues and fields that can be edited.
     * A single request can accommodate a maximum of 1000 issues (including subtasks) and 200 fields
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - Edit "issues permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function submitBulkEdit(
        Schema\IssueBulkEditPayload $request,
    ): Schema\SubmittedBulkOperation {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/fields',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SubmittedBulkOperation::class,
        );
    }

    /**
     * Use this API to submit a bulk issue move request.
     * You can move multiple issues, but they must all be moved to and from a single project, issue type, and parent.
     * You can't move more than 1000 issues (including subtasks) at once
     * 
     * #### Scenarios: ####
     * 
     * This is an early version of the API and it doesn't have full feature parity with the Bulk Move UI experience
     * 
     *  - Moving issue of type A to issue of type B in the same project or a different project: `SUPPORTED`
     *  - Moving multiple issues of type A in one project to multiple issues of type B in the same project or a different project: **`SUPPORTED`**
     *  - Moving a standard parent issue of type A with its multiple subtask issue types in one project to standard issue of type B and multiple subtask issue types in the same project or a different project: `SUPPORTED`
     *  - Moving an epic issue with its child issues to a different project without losing their relation: `NOT SUPPORTED`  
     *     (Workaround: Move them individually and stitch the relationship back with the Bulk Edit API)
     * 
     * #### Limits applied to bulk issue moves: ####
     * 
     * When using the bulk move, keep in mind that there are limits on the number of issues and fields you can include
     * 
     *  - You can move up to 1,000 issues in a single operation, including any subtasks
     *  - All issues must originate from the same project and share the same issue type and parent
     *  - The total combined number of fields across all issues must not exceed 1,500,000.
     * For example, if each issue includes 15,000 fields, then the maximum number of issues that can be moved is 100
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Move "issues permission" in source projects
     *  - Create "issues permission" in destination projects
     *  - Browse "project permission" in destination projects, if moving subtasks only
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function submitBulkMove(
        Schema\IssueBulkMovePayload $request,
    ): Schema\SubmittedBulkOperation {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/move',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SubmittedBulkOperation::class,
        );
    }

    /**
     * Use this API to retrieve a list of transitions available for the specified issues that can be used or bulk transition operations.
     * You can submit either single or multiple issues in the query to obtain the available transitions
     * 
     * The response will provide the available transitions for issues, organized by their respective workflows.
     * **Only the transitions that are common among the issues within that workflow and do not involve any additional field updates will be included.** For bulk transitions that require additional field updates, please utilise the Jira Cloud UI
     * 
     * You can request available transitions for up to 1,000 issues in a single operation.
     * This API uses pagination to return responses, delivering 50 workflows at a time
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Transition "issues permission" in all projects that contain the selected issues
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/#Transition-issues/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdsOrKeys Comma (,) separated Ids or keys of the issues to get transitions available for them.
     * @param string $endingBefore (Optional)The end cursor for use in pagination.
     * @param string $startingAfter (Optional)The start cursor for use in pagination.
     */
    public function getAvailableTransitions(
        string $issueIdsOrKeys,
        ?string $endingBefore = null,
        ?string $startingAfter = null,
    ): Schema\BulkTransitionGetAvailableTransitions {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/transition',
            method: 'get',
            query: compact('issueIdsOrKeys', 'endingBefore', 'startingAfter'),
            success: 200,
            schema: Schema\BulkTransitionGetAvailableTransitions::class,
        );
    }

    /**
     * Use this API to submit a bulk issue status transition request.
     * You can transition multiple issues, alongside with their valid transition Ids.
     * You can transition up to 1,000 issues in a single operation
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Transition "issues permission" in all projects that contain the selected issues
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/#Transition-issues/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function submitBulkTransition(
        Schema\IssueBulkTransitionPayload $request,
    ): Schema\SubmittedBulkOperation {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/transition',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SubmittedBulkOperation::class,
        );
    }

    /**
     * Use this API to submit a bulk unwatch request.
     * You can unwatch up to 1,000 issues in a single operation
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function submitBulkUnwatch(
        Schema\IssueBulkWatchOrUnwatchPayload $request,
    ): Schema\SubmittedBulkOperation {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/unwatch',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SubmittedBulkOperation::class,
        );
    }

    /**
     * Use this API to submit a bulk watch request.
     * You can watch up to 1,000 issues in a single operation
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Browse "project permission" in all projects that contain the selected issues
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function submitBulkWatch(
        Schema\IssueBulkWatchOrUnwatchPayload $request,
    ): Schema\SubmittedBulkOperation {
        return $this->call(
            uri: '/rest/api/3/bulk/issues/watch',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SubmittedBulkOperation::class,
        );
    }

    /**
     * Use this to get the progress state for the specified bulk operation `taskId`
     * 
     * **"Permissions" required:**
     * 
     *  - Global bulk change "permission"
     *  - Administer Jira "global permission", or be the creator of the task
     * 
     * If the task is running, this resource will return:
     * 
     *     {"taskId":"10779","status":"RUNNING","progressPercent":65,"submittedBy":{"accountId":"5b10a2844c20165700ede21g"},"created":1690180055963,"started":1690180056206,"updated":169018005829}
     * 
     * If the task has completed, then this resource will return:
     * 
     *     {"processedAccessibleIssues":[10001,10002],"created":1709189449954,"progressPercent":100,"started":1709189450154,"status":"COMPLETE","submittedBy":{"accountId":"5b10a2844c20165700ede21g"},"invalidOrInaccessibleIssueCount":0,"taskId":"10000","totalIssueCount":2,"updated":1709189450354}
     * 
     * **Note:** You can view task progress for up to 14 days from creation.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
     * 
     * @param string $taskId The ID of the task.
     */
    public function getBulkOperationProgress(
        string $taskId,
    ): Schema\BulkOperationProgress {
        return $this->call(
            uri: '/rest/api/3/bulk/queue/{taskId}',
            method: 'get',
            path: compact('taskId'),
            success: 200,
            schema: Schema\BulkOperationProgress::class,
        );
    }
}
