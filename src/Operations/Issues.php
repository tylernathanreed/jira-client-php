<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Issues
{
    /**
     * Bulk fetch changelogs for multiple issues and filter by fields
     * 
     * Returns a paginated list of all changelogs for given issues sorted by changelog date and issue IDs, starting from the oldest changelog and smallest issue ID
     * 
     * Issues are identified by their ID or key, and optionally changelogs can be filtered by their field IDs.
     * You can request the changelogs of up to 1000 issues and can filter them by up to 10 field IDs
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the projects that the issues are in
     *  - If "issue-level security" is configured, issue-level security permission to view the issues.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function getBulkChangelogs(
        Schema\BulkChangelogRequestBean $request,
    ): Schema\BulkChangelogResponseBean {
        return $this->call(
            uri: '/rest/api/3/changelog/bulkfetch',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\BulkChangelogResponseBean::class,
        );
    }

    /**
     * Returns all issue events
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getEvents(): true
    {
        return $this->call(
            uri: '/rest/api/3/events',
            method: 'get',
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates an issue or, where the option to create subtasks is enabled in Jira, a subtask.
     * A transition may be applied, to move the issue or subtask to a workflow step other than the default start step, and issue properties set
     * 
     * The content of the issue or subtask is defined using `update` and `fields`.
     * The fields that can be set in the issue or subtask are determined using the " Get create issue metadata".
     * These are the same fields that appear on the issue's create screen.
     * Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content.
     * Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content
     * 
     * Creating a subtask differs from creating an issue as follows:
     * 
     *  - `issueType` must be set to a subtask issue type (use " Get create issue metadata" to find subtask issue types)
     *  - `parent` must contain the ID or key of the parent issue
     * 
     * In a next-gen project any issue may be made a child providing that the parent and child are members of the same project
     * 
     * **"Permissions" required:** *Browse projects* and *Create issues* "project permissions" for the project in which the issue or subtask is created.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira.
     *                            When provided, the issue type and request type are added to the user's history for a project.
     *                            These values are then used to provide defaults on the issue create screen.
     */
    public function createIssue(
        Schema\IssueUpdateDetails $request,
        ?bool $updateHistory = false,
    ): Schema\CreatedIssue {
        return $this->call(
            uri: '/rest/api/3/issue',
            method: 'post',
            body: $request,
            query: compact('updateHistory'),
            success: 201,
            schema: Schema\CreatedIssue::class,
        );
    }

    /**
     * Enables admins to archive up to 1000 issues in a single request using issue ID/key, returning details of the issue(s) archived in the process and the errors encountered, if any
     * 
     * **Note that:**
     * 
     *  - you can't archive subtasks directly, only through their parent issues
     *  - you can only archive issues from software, service management, and business projects
     * 
     * **"Permissions" required:** Jira admin or site admin: "global permission"
     * 
     * **License required:** Premium or Enterprise
     * 
     * **Signed-in users only:** This API can't be accessed anonymously
     * 
     *   
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function archiveIssues(
        Schema\IssueArchivalSyncRequest $request,
    ): Schema\IssueArchivalSyncResponse {
        return $this->call(
            uri: '/rest/api/3/issue/archive',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\IssueArchivalSyncResponse::class,
        );
    }

    /**
     * Enables admins to archive up to 100,000 issues in a single request using JQL, returning the URL to check the status of the submitted request
     * 
     * You can use the "get task" and "cancel task" APIs to manage the request
     * 
     * **Note that:**
     * 
     *  - you can't archive subtasks directly, only through their parent issues
     *  - you can only archive issues from software, service management, and business projects
     * 
     * **"Permissions" required:** Jira admin or site admin: "global permission"
     * 
     * **License required:** Premium or Enterprise
     * 
     * **Signed-in users only:** This API can't be accessed anonymously
     * 
     * **Rate limiting:** Only a single request per jira instance can be active at any given time
     * 
     *   
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-tasks/#api-rest-api-3-task-taskid-get
     * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-tasks/#api-rest-api-3-task-taskid-cancel-post
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function archiveIssuesAsync(
        Schema\ArchiveIssueAsyncRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/archive',
            method: 'post',
            body: $request,
            success: 202,
            schema: true,
        );
    }

    /**
     * Creates upto **50** issues and, where the option to create subtasks is enabled in Jira, subtasks.
     * Transitions may be applied, to move the issues or subtasks to a workflow step other than the default start step, and issue properties set
     * 
     * The content of each issue or subtask is defined using `update` and `fields`.
     * The fields that can be set in the issue or subtask are determined using the " Get create issue metadata".
     * These are the same fields that appear on the issues' create screens.
     * Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content.
     * Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content
     * 
     * Creating a subtask differs from creating an issue as follows:
     * 
     *  - `issueType` must be set to a subtask issue type (use " Get create issue metadata" to find subtask issue types)
     *  - `parent` the must contain the ID or key of the parent issue
     * 
     * **"Permissions" required:** *Browse projects* and *Create issues* "project permissions" for the project in which each issue or subtask is created.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     */
    public function createIssues(
        Schema\IssuesUpdateBean $request,
    ): Schema\CreatedIssues {
        return $this->call(
            uri: '/rest/api/3/issue/bulk',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\CreatedIssues::class,
        );
    }

    /**
     * Returns the details for a set of requested issues.
     * You can request up to 100 issues
     * 
     * Each issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed.
     * If a matching issue is found its details are returned, a 302 or other redirect is **not** returned
     * 
     * Issues will be returned in ascending `id` order.
     * If there are errors, Jira will return a list of issues which couldn't be fetched along with error messages
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function bulkFetchIssues(
        Schema\BulkFetchIssueRequestBean $request,
    ): Schema\BulkIssueResults {
        return $this->call(
            uri: '/rest/api/3/issue/bulkfetch',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\BulkIssueResults::class,
        );
    }

    /**
     * Returns details of projects, issue types within projects, and, when requested, the create screen fields for each issue type for the user.
     * Use the information to populate the requests in " Create issue" and "Create issues"
     * 
     * Deprecated, see "Create Issue Meta Endpoint Deprecation Notice"
     * 
     * The request can be restricted to specific projects or issue types using the query parameters.
     * The response will contain information for the valid projects, issue types, or project and issue type combinations requested.
     * Note that invalid project, issue type, or project and issue type combinations do not generate errors
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Create issues* "project permission" in the requested projects.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-1304
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param ?list<string> $projectIds List of project IDs.
     *                                  This parameter accepts a comma-separated list.
     *                                  Multiple project IDs can also be provided using an ampersand-separated list.
     *                                  For example, `projectIds=10000,10001&projectIds=10020,10021`.
     *                                  This parameter may be provided with `projectKeys`.
     * @param ?list<string> $projectKeys List of project keys.
     *                                   This parameter accepts a comma-separated list.
     *                                   Multiple project keys can also be provided using an ampersand-separated list.
     *                                   For example, `projectKeys=proj1,proj2&projectKeys=proj3`.
     *                                   This parameter may be provided with `projectIds`.
     * @param ?list<string> $issuetypeIds List of issue type IDs.
     *                                    This parameter accepts a comma-separated list.
     *                                    Multiple issue type IDs can also be provided using an ampersand-separated list.
     *                                    For example, `issuetypeIds=10000,10001&issuetypeIds=10020,10021`.
     *                                    This parameter may be provided with `issuetypeNames`.
     * @param ?list<string> $issuetypeNames List of issue type names.
     *                                      This parameter accepts a comma-separated list.
     *                                      Multiple issue type names can also be provided using an ampersand-separated list.
     *                                      For example, `issuetypeNames=name1,name2&issuetypeNames=name3`.
     *                                      This parameter may be provided with `issuetypeIds`.
     * @param string $expand Use "expand" to include additional information about issue metadata in the response.
     *                       This parameter accepts `projects.issuetypes.fields`, which returns information about the fields in the issue creation screen for each issue type.
     *                       Fields hidden from the screen are not returned.
     *                       Use the information to populate the `fields` and `update` fields in "Create issue" and "Create issues".
     */
    public function getCreateIssueMeta(
        ?array $projectIds = null,
        ?array $projectKeys = null,
        ?array $issuetypeIds = null,
        ?array $issuetypeNames = null,
        ?string $expand = null,
    ): Schema\IssueCreateMetadata {
        return $this->call(
            uri: '/rest/api/3/issue/createmeta',
            method: 'get',
            query: compact('projectIds', 'projectKeys', 'issuetypeIds', 'issuetypeNames', 'expand'),
            success: 200,
            schema: Schema\IssueCreateMetadata::class,
        );
    }

    /**
     * Returns a page of issue type metadata for a specified project.
     * Use the information to populate the requests in " Create issue" and "Create issues"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Create issues* "project permission" in the requested projects.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The ID or key of the project.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getCreateIssueMetaIssueTypes(
        string $projectIdOrKey,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageOfCreateMetaIssueTypes {
        return $this->call(
            uri: '/rest/api/3/issue/createmeta/{projectIdOrKey}/issuetypes',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\PageOfCreateMetaIssueTypes::class,
        );
    }

    /**
     * Returns a page of field metadata for a specified project and issuetype id.
     * Use the information to populate the requests in " Create issue" and "Create issues"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Create issues* "project permission" in the requested projects.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The ID or key of the project.
     * @param string $issueTypeId The issuetype ID.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getCreateIssueMetaIssueTypeId(
        string $projectIdOrKey,
        string $issueTypeId,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageOfCreateMetaIssueTypeWithField {
        return $this->call(
            uri: '/rest/api/3/issue/createmeta/{projectIdOrKey}/issuetypes/{issueTypeId}',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('projectIdOrKey', 'issueTypeId'),
            success: 200,
            schema: Schema\PageOfCreateMetaIssueTypeWithField::class,
        );
    }

    /**
     * Returns all issues breaching and approaching per-issue limits
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" is required for the project the issues are in.
     * Results may be incomplete otherwise
     *  - *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param bool $isReturningKeys Return issue keys instead of issue ids in the response
     *                              Usage: Add `?isReturningKeys=true` to the end of the path to request issue keys.
     */
    public function getIssueLimitReport(
        ?bool $isReturningKeys = false,
    ): Schema\IssueLimitReportResponseBean {
        return $this->call(
            uri: '/rest/api/3/issue/limit/report',
            method: 'get',
            query: compact('isReturningKeys'),
            success: 200,
            schema: Schema\IssueLimitReportResponseBean::class,
        );
    }

    /**
     * Enables admins to unarchive up to 1000 issues in a single request using issue ID/key, returning details of the issue(s) unarchived in the process and the errors encountered, if any
     * 
     * **Note that:**
     * 
     *  - you can't unarchive subtasks directly, only through their parent issues
     *  - you can only unarchive issues from software, service management, and business projects
     * 
     * **"Permissions" required:** Jira admin or site admin: "global permission"
     * 
     * **License required:** Premium or Enterprise
     * 
     * **Signed-in users only:** This API can't be accessed anonymously
     * 
     *   
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function unarchiveIssues(
        Schema\IssueArchivalSyncRequest $request,
    ): Schema\IssueArchivalSyncResponse {
        return $this->call(
            uri: '/rest/api/3/issue/unarchive',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\IssueArchivalSyncResponse::class,
        );
    }

    /**
     * Returns the details for an issue
     * 
     * The issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed.
     * If a matching issue is found its details are returned, a 302 or other redirect is **not** returned.
     * The issue key returned in the response is the key of the issue found
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param ?list<string> $fields A list of fields to return for the issue.
     *                              This parameter accepts a comma-separated list.
     *                              Use it to retrieve a subset of fields.
     *                              Allowed values:
     *                               - `*all` Returns all fields
     *                               - `*navigable` Returns navigable fields
     *                               - Any issue field, prefixed with a minus to exclude
     *                              Examples:
     *                               - `summary,comment` Returns only the summary and comments fields
     *                               - `-description` Returns all (default) fields except description
     *                               - `*navigable,-comment` Returns all navigable fields except comment
     *                              This parameter may be specified multiple times.
     *                              For example, `fields=field1,field2& fields=field3`
     *                              Note: All fields are returned by default.
     *                              This differs from "Search for issues using JQL (GET)" and "Search for issues using JQL (POST)" where the default is all navigable fields.
     * @param bool $fieldsByKeys Whether fields in `fields` are referenced by keys rather than IDs.
     *                           This parameter is useful where fields have been added by a connect app and a field's key may differ from its ID.
     * @param string $expand Use "expand" to include additional information about the issues in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `renderedFields` Returns field values rendered in HTML format
     *                        - `names` Returns the display name of each field
     *                        - `schema` Returns the schema describing a field type
     *                        - `transitions` Returns all possible transitions for the issue
     *                        - `editmeta` Returns information about how each field can be edited
     *                        - `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent
     *                        - `versionedRepresentations` Returns a JSON array for each version of a field's value, with the highest number representing the most recent version.
     *                       Note: When included in the request, the `fields` parameter is ignored.
     * @param ?list<string> $properties A list of issue properties to return for the issue.
     *                                  This parameter accepts a comma-separated list.
     *                                  Allowed values:
     *                                   - `*all` Returns all issue properties
     *                                   - Any issue property key, prefixed with a minus to exclude
     *                                  Examples:
     *                                   - `*all` Returns all properties
     *                                   - `*all,-prop1` Returns all properties except `prop1`
     *                                   - `prop1,prop2` Returns `prop1` and `prop2` properties
     *                                  This parameter may be specified multiple times.
     *                                  For example, `properties=prop1,prop2& properties=prop3`.
     * @param bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira.
     *                            This also populates the "JQL issues search" `lastViewed` field.
     * @param bool $failFast Whether to fail the request quickly in case of an error while loading fields for an issue.
     *                       For `failFast=true`, if one field fails, the entire operation fails.
     *                       For `failFast=false`, the operation will continue even if a field fails.
     *                       It will return a valid response, but without values for the failed field(s).
     */
    public function getIssue(
        string $issueIdOrKey,
        ?array $fields = null,
        ?bool $fieldsByKeys = false,
        ?string $expand = null,
        ?array $properties = null,
        ?bool $updateHistory = false,
        ?bool $failFast = false,
    ): Schema\IssueBean {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}',
            method: 'get',
            query: compact('fields', 'fieldsByKeys', 'expand', 'properties', 'updateHistory', 'failFast'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\IssueBean::class,
        );
    }

    /**
     * Edits an issue.
     * Issue properties may be updated as part of the edit.
     * Please note that issue transition is not supported and is ignored here.
     * To transition an issue, please use "Transition issue"
     * 
     * The edits to the issue's fields are defined using `update` and `fields`.
     * The fields that can be edited are determined using " Get edit issue metadata"
     * 
     * The parent field may be set by key or ID.
     * For standard issue types, the parent may be removed by setting `update.parent.set.none` to *true*.
     * Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content.
     * Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content
     * 
     * Connect apps having an app user with *Administer Jira* "global permission", and Forge apps acting on behalf of users with *Administer Jira* "global permission", can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Edit issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param bool $notifyUsers Whether a notification email about the issue update is sent to all watchers.
     *                          To disable the notification, administer Jira or administer project permissions are required.
     *                          If the user doesn't have the necessary permission the request is ignored.
     * @param bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited.
     *                                     Available to Connect app users with *Administer Jira* "global permission" and Forge apps acting on behalf of users with *Administer Jira* "global permission".
     *                                     @link https://confluence.atlassian.com/x/x4dKLg
     * @param bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited.
     *                                   Available to Connect app users with *Administer Jira* "global permission" and Forge apps acting on behalf of users with *Administer Jira* "global permission".
     *                                   @link https://confluence.atlassian.com/x/x4dKLg
     * @param bool $returnIssue Whether the response should contain the issue with fields edited in this request.
     *                          The returned issue will have the same format as in the "Get issue API".
     * @param string $expand The Get issue API expand parameter to use in the response if the `returnIssue` parameter is `true`.
     */
    public function editIssue(
        Schema\IssueUpdateDetails $request,
        string $issueIdOrKey,
        ?bool $notifyUsers = true,
        ?bool $overrideScreenSecurity = false,
        ?bool $overrideEditableFlag = false,
        ?bool $returnIssue = false,
        ?string $expand = '',
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}',
            method: 'put',
            body: $request,
            query: compact('notifyUsers', 'overrideScreenSecurity', 'overrideEditableFlag', 'returnIssue', 'expand'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes an issue
     * 
     * An issue cannot be deleted if it has one or more subtasks.
     * To delete an issue with subtasks, set `deleteSubtasks`.
     * This causes the issue's subtasks to be deleted with the issue
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Delete issues* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param 'true'|'false'|null $deleteSubtasks
     *        Whether the issue's subtasks are deleted when the issue is deleted.
     */
    public function deleteIssue(
        string $issueIdOrKey,
        ?string $deleteSubtasks = 'false',
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}',
            method: 'delete',
            query: compact('deleteSubtasks'),
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Assigns an issue to a user.
     * Use this operation when the calling user does not have the *Edit Issues* permission but has the *Assign issue* permission for the project that the issue is in
     * 
     * If `name` or `accountId` is set to:
     * 
     *  - `"-1"`, the issue is assigned to the default assignee for the project
     *  - `null`, the issue is set to unassigned
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse Projects* and *Assign Issues* " project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue to be assigned.
     */
    public function assignIssue(
        Schema\User $request,
        string $issueIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/assignee',
            method: 'put',
            body: $request,
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of all changelogs for an issue sorted by date, starting from the oldest
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getChangeLogs(
        string $issueIdOrKey,
        ?int $startAt = 0,
        ?int $maxResults = 100,
    ): Schema\PageBeanChangelog {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/changelog',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\PageBeanChangelog::class,
        );
    }

    /**
     * Returns changelogs for an issue specified by a list of changelog IDs
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function getChangeLogsByIds(
        Schema\IssueChangelogIds $request,
        string $issueIdOrKey,
    ): Schema\PageOfChangelogs {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/changelog/list',
            method: 'post',
            body: $request,
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\PageOfChangelogs::class,
        );
    }

    /**
     * Returns the edit screen fields for an issue that are visible to and editable by the user.
     * Use the information to populate the requests in "Edit issue"
     * 
     * This endpoint will check for these conditions:
     * 
     * 1.
     *  Field is available on a field screen - through screen, screen scheme, issue type screen scheme, and issue type scheme configuration.
     * `overrideScreenSecurity=true` skips this condition
     * 2.
     *  Field is visible in the "field configuration".
     * `overrideScreenSecurity=true` skips this condition
     * 3.
     *  Field is shown on the issue: each field has different conditions here.
     * For example: Attachment field only shows if attachments are enabled.
     * Assignee only shows if user has permissions to assign the issue
     * 4.
     *  If a field is custom then it must have valid custom field context, applicable for its project and issue type.
     * All system fields are assumed to have context in all projects and all issue types
     * 5.
     *  Issue has a project, issue type, and status defined
     * 6.
     *  Issue is assigned to a valid workflow, and the current status has assigned a workflow step.
     * `overrideEditableFlag=true` skips this condition
     * 7.
     *  The current workflow step is editable.
     * This is true by default, but "can be disabled by setting" the `jira.issue.editable` property to `false`.
     * `overrideEditableFlag=true` skips this condition
     * 8.
     *  User has "Edit issues permission"
     * 9.
     *  Workflow permissions allow editing a field.
     * This is true by default but "can be modified" using `jira.permission.*` workflow properties
     * 
     * Fields hidden using "Issue layout settings page" remain editable
     * 
     * Connect apps having an app user with *Administer Jira* "global permission", and Forge apps acting on behalf of users with *Administer Jira* "global permission", can return additional details using:
     * 
     *  - `overrideScreenSecurity` When this flag is `true`, then this endpoint skips checking if fields are available through screens, and field configuration (conditions 1.
     * and 2.
     * from the list above)
     *  - `overrideEditableFlag` When this flag is `true`, then this endpoint skips checking if workflow is present and if the current step is editable (conditions 6.
     * and 7.
     * from the list above)
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     * 
     * Note: For any fields to be editable the user must have the *Edit issues* "project permission" for the issue.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/change-a-field-configuration/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/
     * @link https://support.atlassian.com/jira-software-cloud/docs/configure-field-layout-in-the-issue-view/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param bool $overrideScreenSecurity Whether hidden fields are returned.
     *                                     Available to Connect app users with *Administer Jira* "global permission" and Forge apps acting on behalf of users with *Administer Jira* "global permission".
     *                                     @link https://confluence.atlassian.com/x/x4dKLg
     * @param bool $overrideEditableFlag Whether non-editable fields are returned.
     *                                   Available to Connect app users with *Administer Jira* "global permission" and Forge apps acting on behalf of users with *Administer Jira* "global permission".
     *                                   @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getEditIssueMeta(
        string $issueIdOrKey,
        ?bool $overrideScreenSecurity = false,
        ?bool $overrideEditableFlag = false,
    ): Schema\IssueUpdateMetadata {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/editmeta',
            method: 'get',
            query: compact('overrideScreenSecurity', 'overrideEditableFlag'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\IssueUpdateMetadata::class,
        );
    }

    /**
     * Creates an email notification for an issue and adds it to the mail queue
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse Projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey ID or key of the issue that the notification is sent for.
     */
    public function notify(
        Schema\Notification $request,
        string $issueIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/notify',
            method: 'post',
            body: $request,
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns either all transitions or a transition that can be performed by the user on an issue, based on the issue's status
     * 
     * Note, if a request is made for a transition that does not exist or cannot be performed on the issue, given its status, the response will return any empty transitions list
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required: A list or transition is returned only when the user has:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     * 
     * However, if the user does not have the *Transition issues* " project permission" the response will not list any transitions.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $expand Use "expand" to include additional information about transitions in the response.
     *                       This parameter accepts `transitions.fields`, which returns information about the fields in the transition screen for each transition.
     *                       Fields hidden from the screen are not returned.
     *                       Use this information to populate the `fields` and `update` fields in "Transition issue".
     * @param string $transitionId The ID of the transition.
     * @param bool $skipRemoteOnlyCondition Whether transitions with the condition *Hide From User Condition* are included in the response.
     * @param bool $includeUnavailableTransitions Whether details of transitions that fail a condition are included in the response
     * @param bool $sortByOpsBarAndStatus Whether the transitions are sorted by ops-bar sequence value first then category order (Todo, In Progress, Done) or only by ops-bar sequence value.
     */
    public function getTransitions(
        string $issueIdOrKey,
        ?string $expand = null,
        ?string $transitionId = null,
        ?bool $skipRemoteOnlyCondition = false,
        ?bool $includeUnavailableTransitions = false,
        ?bool $sortByOpsBarAndStatus = false,
    ): Schema\Transitions {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/transitions',
            method: 'get',
            query: compact('expand', 'transitionId', 'skipRemoteOnlyCondition', 'includeUnavailableTransitions', 'sortByOpsBarAndStatus'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\Transitions::class,
        );
    }

    /**
     * Performs an issue transition and, if the transition has a screen, updates the fields from the transition screen
     * 
     * sortByCategory To update the fields on the transition screen, specify the fields in the `fields` or `update` parameters in the request body.
     * Get details about the fields using " Get transitions" with the `transitions.fields` expand
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Transition issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function doTransition(
        Schema\IssueUpdateDetails $request,
        string $issueIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/transitions',
            method: 'post',
            body: $request,
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Enables admins to retrieve details of all archived issues.
     * Upon a successful request, the admin who submitted it will receive an email with a link to download a CSV file with the issue details
     * 
     * Note that this API only exports the values of system fields and archival-specific fields (`ArchivedBy` and `ArchivedDate`).
     * Custom fields aren't supported
     * 
     * **"Permissions" required:** Jira admin or site admin: "global permission"
     * 
     * **License required:** Premium or Enterprise
     * 
     * **Signed-in users only:** This API can't be accessed anonymously
     * 
     * **Rate limiting:** Only a single request can be active at any given time
     * 
     *   
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function exportArchivedIssues(
        Schema\ArchivedIssuesFilterRequest $request,
    ): Schema\ExportArchivedIssuesTaskProgressResponse {
        return $this->call(
            uri: '/rest/api/3/issues/archive/export',
            method: 'put',
            body: $request,
            success: 202,
            schema: Schema\ExportArchivedIssuesTaskProgressResponse::class,
        );
    }
}
