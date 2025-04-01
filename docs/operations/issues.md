# Issues

Source: [`Jira\Client\Operations\Issues`](/src/Operations/Issues.php)

## Operations

- [Bulk Fetch Changelogs](#getBulkChangelogs)
- [Get Events](#getEvents)
- [Create Issue](#createIssue)
- [Archive Issue(s) By Issue ID/key](#archiveIssues)
- [Archive Issue(s) By JQL](#archiveIssuesAsync)
- [Bulk Create Issue](#createIssues)
- [Bulk Fetch Issues](#bulkFetchIssues)
- [Get Create Issue Metadata](#getCreateIssueMeta)
- [Get Create Metadata Issue Types For A Project](#getCreateIssueMetaIssueTypes)
- [Get Create Field Metadata For A Project And Issue Type Id](#getCreateIssueMetaIssueTypeId)
- [Get Issue Limit Report](#getIssueLimitReport)
- [Unarchive Issue(s) By Issue Keys/ID](#unarchiveIssues)
- [Get Issue](#getIssue)
- [Edit Issue](#editIssue)
- [Delete Issue](#deleteIssue)
- [Assign Issue](#assignIssue)
- [Get Changelogs](#getChangeLogs)
- [Get Changelogs By IDs](#getChangeLogsByIds)
- [Get Edit Issue Metadata](#getEditIssueMeta)
- [Send Notification For Issue](#notify)
- [Get Transitions](#getTransitions)
- [Transition Issue](#doTransition)
- [Export Archived Issue(s)](#exportArchivedIssues)

## Bulk Fetch Changelogs
<a name="getBulkChangelogs"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-changelog-bulkfetch-post

Bulk fetch changelogs for multiple issues and filter by fields

Returns a paginated list of all changelogs for given issues sorted by changelog date and issue IDs, starting from the oldest changelog and smallest issue ID

Issues are identified by their ID or key, and optionally changelogs can be filtered by their field IDs.
You can request the changelogs of up to 1000 issues and can filter them by up to 10 field IDs

**"Permissions" required:**

 - *Browse projects* "project permission" for the projects that the issues are in
 - If "issue-level security" is configured, issue-level security permission to view the issues.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkChangelogRequestBean`](/docs/schema/bulk-changelog-request-bean.md)

Request bean for bulk changelog retrieval

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `list<string>` | List of issue IDs/keys to fetch changelogs for |
| `fieldIds` | `?list<string>` | List of field IDs to filter changelogs |
| `maxResults` | `int` | The maximum number of items to return per page |
| `nextPageToken` | `string` | The cursor for pagination |

#### Response

Source: [`Jira\Client\Schema\BulkChangelogResponseBean`](/docs/schema/bulk-changelog-response-bean.md)

A page of changelogs which is designed to handle multiple issues

| Property | Type | Description |
| --- | --- | --- |
| `issueChangeLogs` | [`?list<IssueChangeLog>`](/docs/schema/issue-change-log.md) | The list of issues changelogs. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page, this token will be null. |


## Get Events
<a name="getEvents"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-events-get

Returns all issue events

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getEvents();
```

### Request

#### Response


## Create Issue
<a name="createIssue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-post

Creates an issue or, where the option to create subtasks is enabled in Jira, a subtask.
A transition may be applied, to move the issue or subtask to a workflow step other than the default start step, and issue properties set

The content of the issue or subtask is defined using `update` and `fields`.
The fields that can be set in the issue or subtask are determined using the " Get create issue metadata".
These are the same fields that appear on the issue's create screen.
Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content.
Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content

Creating a subtask differs from creating an issue as follows:

 - `issueType` must be set to a subtask issue type (use " Get create issue metadata" to find subtask issue types)
 - `parent` must contain the ID or key of the parent issue

In a next-gen project any issue may be made a child providing that the parent and child are members of the same project

**"Permissions" required:** *Browse projects* and *Create issues* "project permissions" for the project in which the issue or subtask is created.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\CreatedIssue $response */
$response = $client->createIssue(
    request: new Schema\IssueUpdateDetails(
        fields: [
                'assignee' => [
                    'id' => '5b109f2e9729b51b54dc274d',
                ],
                'components' => [
                    0 => [
                        'id' => '10000',
                    ],
                ],
                'customfield_10000' => '09/Jun/19',
                'customfield_20000' => '06/Jul/19 3:25 PM',
                'customfield_30000' => [
                    0 => '10000',
                    1 => '10002',
                ],
                'customfield_40000' => [
                    'content' => [
                        0 => [
                            'content' => [
                                0 => [
                                    'text' => 'Occurs on all orders',
                                    'type' => 'text',
                                ],
                            ],
                            'type' => 'paragraph',
                        ],
                    ],
                    'type' => 'doc',
                    'version' => '1',
                ],
                'customfield_50000' => [
                    'content' => [
                        0 => [
                            'content' => [
                                0 => [
                                    'text' => 'Could impact day-to-day work.',
                                    'type' => 'text',
                                ],
                            ],
                            'type' => 'paragraph',
                        ],
                    ],
                    'type' => 'doc',
                    'version' => '1',
                ],
                'customfield_60000' => 'jira-software-users',
                'customfield_70000' => [
                    0 => 'jira-administrators',
                    1 => 'jira-software-users',
                ],
                'customfield_80000' => [
                    'value' => 'red',
                ],
                'description' => [
                    'content' => [
                        0 => [
                            'content' => [
                                0 => [
                                    'text' => 'Order entry fails when selecting supplier.',
                                    'type' => 'text',
                                ],
                            ],
                            'type' => 'paragraph',
                        ],
                    ],
                    'type' => 'doc',
                    'version' => '1',
                ],
                'duedate' => '2019-05-11',
                'environment' => [
                    'content' => [
                        0 => [
                            'content' => [
                                0 => [
                                    'text' => 'UAT',
                                    'type' => 'text',
                                ],
                            ],
                            'type' => 'paragraph',
                        ],
                    ],
                    'type' => 'doc',
                    'version' => '1',
                ],
                'fixVersions' => [
                    0 => [
                        'id' => '10001',
                    ],
                ],
                'issuetype' => [
                    'id' => '10000',
                ],
                'labels' => [
                    0 => 'bugfix',
                    1 => 'blitz_test',
                ],
                'parent' => [
                    'key' => 'PROJ-123',
                ],
                'priority' => [
                    'id' => '20000',
                ],
                'project' => [
                    'id' => '10000',
                ],
                'reporter' => [
                    'id' => '5b10a2844c20165700ede21g',
                ],
                'security' => [
                    'id' => '10000',
                ],
                'summary' => 'Main order flow broken',
                'timetracking' => [
                    'originalEstimate' => '10',
                    'remainingEstimate' => '5',
                ],
                'versions' => [
                    0 => [
                        'id' => '10000',
                    ],
                ],
            ],
        update: [
            ],
    )
    updateHistory: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueUpdateDetails`](/docs/schema/issue-update-details.md)

Details of an issue update request.

| Property | Type | Description |
| --- | --- | --- |
| `fields` | `array<string,mixed>` | List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`. |
| `historyMetadata` | [`HistoryMetadata`](/docs/schema/history-metadata.md) | Additional issue history details. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of issue properties to be add or update. |
| `transition` | [`IssueTransition`](/docs/schema/issue-transition.md) | Details of a transition. Required when performing a transition, optional when creating or editing an issue. |
| `update` | [`array<string,FieldUpdateOperation>`](/docs/schema/field-update-operation.md) | A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `updateHistory` | `?bool` | Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. When provided, the issue type and request type are added to the user's history for a project. These values are then used to provide defaults on the issue create screen. |

#### Response

Source: [`Jira\Client\Schema\CreatedIssue`](/docs/schema/created-issue.md)

Details about a created issue or subtask.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the created issue or subtask. |
| `key` | `string` | The key of the created issue or subtask. |
| `self` | `string` | The URL of the created issue or subtask. |
| `transition` | [`NestedResponse`](/docs/schema/nested-response.md) | The response code and messages related to any requested transition. |
| `watchers` | [`NestedResponse`](/docs/schema/nested-response.md) | The response code and messages related to any requested watchers. |


## Archive Issue(s) By Issue ID/key
<a name="archiveIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-archive-put

Enables admins to archive up to 1000 issues in a single request using issue ID/key, returning details of the issue(s) archived in the process and the errors encountered, if any

**Note that:**

 - you can't archive subtasks directly, only through their parent issues
 - you can only archive issues from software, service management, and business projects

**"Permissions" required:** Jira admin or site admin: "global permission"

**License required:** Premium or Enterprise

**Signed-in users only:** This API can't be accessed anonymously

  
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueArchivalSyncResponse $response */
$response = $client->archiveIssues(new Schema\IssueArchivalSyncRequest(
    issueIdsOrKeys: [
                'PR-1',
                '1001',
                'PROJECT-2',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueArchivalSyncRequest`](/docs/schema/issue-archival-sync-request.md)

List of Issue Ids Or Keys that are to be archived or unarchived

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `?list<string>` |  |

#### Response

Source: [`Jira\Client\Schema\IssueArchivalSyncResponse`](/docs/schema/issue-archival-sync-response.md)

Number of archived/unarchived issues and list of errors that occurred during the action, if any.

| Property | Type | Description |
| --- | --- | --- |
| `errors` | [`Errors`](/docs/schema/errors.md) |  |
| `numberOfIssuesUpdated` | `int` |  |


## Archive Issue(s) By JQL
<a name="archiveIssuesAsync"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-archive-post

Enables admins to archive up to 100,000 issues in a single request using JQL, returning the URL to check the status of the submitted request

You can use the "get task" and "cancel task" APIs to manage the request

**Note that:**

 - you can't archive subtasks directly, only through their parent issues
 - you can only archive issues from software, service management, and business projects

**"Permissions" required:** Jira admin or site admin: "global permission"

**License required:** Premium or Enterprise

**Signed-in users only:** This API can't be accessed anonymously

**Rate limiting:** Only a single request per jira instance can be active at any given time

  
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-tasks/#api-rest-api-3-task-taskid-get
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-tasks/#api-rest-api-3-task-taskid-cancel-post
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->archiveIssuesAsync(new Schema\ArchiveIssueAsyncRequest(
    jql: 'project = FOO AND updated < -2y',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ArchiveIssueAsyncRequest`](/docs/schema/archive-issue-async-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `string` |  |

#### Response

`true`
## Bulk Create Issue
<a name="createIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-bulk-post

Creates upto **50** issues and, where the option to create subtasks is enabled in Jira, subtasks.
Transitions may be applied, to move the issues or subtasks to a workflow step other than the default start step, and issue properties set

The content of each issue or subtask is defined using `update` and `fields`.
The fields that can be set in the issue or subtask are determined using the " Get create issue metadata".
These are the same fields that appear on the issues' create screens.
Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content.
Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content

Creating a subtask differs from creating an issue as follows:

 - `issueType` must be set to a subtask issue type (use " Get create issue metadata" to find subtask issue types)
 - `parent` the must contain the ID or key of the parent issue

**"Permissions" required:** *Browse projects* and *Create issues* "project permissions" for the project in which each issue or subtask is created.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\CreatedIssues $response */
$response = $client->createIssues(new Schema\IssuesUpdateBean(
    issueUpdates: [
                [
                    'fields' => [
                        'assignee' => [
                            'id' => '5b109f2e9729b51b54dc274d',
                        ],
                        'components' => [
                            [
                                'id' => '10000',
                            ],
                        ],
                        'customfield_10000' => '09/Jun/19',
                        'customfield_20000' => '06/Jul/19 3:25 PM',
                        'customfield_30000' => [
                            '10000',
                            '10002',
                        ],
                        'customfield_40000' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'Occurs on all orders',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'customfield_50000' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'Could impact day-to-day work.',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'customfield_60000' => 'jira-software-users',
                        'customfield_70000' => [
                            'jira-administrators',
                            'jira-software-users',
                        ],
                        'customfield_80000' => [
                            'value' => 'red',
                        ],
                        'description' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'Order entry fails when selecting supplier.',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'duedate' => '2011-03-11',
                        'environment' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'UAT',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'fixVersions' => [
                            [
                                'id' => '10001',
                            ],
                        ],
                        'issuetype' => [
                            'id' => '10000',
                        ],
                        'labels' => [
                            'bugfix',
                            'blitz_test',
                        ],
                        'priority' => [
                            'id' => '20000',
                        ],
                        'project' => [
                            'id' => '10000',
                        ],
                        'reporter' => [
                            'id' => '5b10a2844c20165700ede21g',
                        ],
                        'security' => [
                            'id' => '10000',
                        ],
                        'summary' => 'Main order flow broken',
                        'timetracking' => [
                            'originalEstimate' => '10',
                            'remainingEstimate' => '5',
                        ],
                        'versions' => [
                            [
                                'id' => '10000',
                            ],
                        ],
                    ],
                    'update' => [
                        'worklog' => [
                            [
                                'add' => [
                                    'started' => '2019-07-05T11:05:00.000+0000',
                                    'timeSpent' => '60m',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'fields' => [
                        'assignee' => [
                            'id' => '5b109f2e9729b51b54dc274d',
                        ],
                        'components' => [
                            [
                                'id' => '10000',
                            ],
                        ],
                        'customfield_10000' => '09/Jun/19',
                        'customfield_20000' => '06/Jul/19 3:25 PM',
                        'customfield_30000' => [
                            '10000',
                            '10002',
                        ],
                        'customfield_40000' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'Occurs on all orders',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'customfield_50000' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'Could impact day-to-day work.',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'customfield_60000' => 'jira-software-users',
                        'customfield_70000' => [
                            'jira-administrators',
                            'jira-software-users',
                        ],
                        'customfield_80000' => [
                            'value' => 'red',
                        ],
                        'description' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'Order remains pending after approved.',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'duedate' => '2019-04-16',
                        'environment' => [
                            'content' => [
                                [
                                    'content' => [
                                        [
                                            'text' => 'UAT',
                                            'type' => 'text',
                                        ],
                                    ],
                                    'type' => 'paragraph',
                                ],
                            ],
                            'type' => 'doc',
                            'version' => '1',
                        ],
                        'fixVersions' => [
                            [
                                'id' => '10001',
                            ],
                        ],
                        'issuetype' => [
                            'id' => '10000',
                        ],
                        'labels' => [
                            'new_release',
                        ],
                        'priority' => [
                            'id' => '20000',
                        ],
                        'project' => [
                            'id' => '1000',
                        ],
                        'reporter' => [
                            'id' => '5b10a2844c20165700ede21g',
                        ],
                        'security' => [
                            'id' => '10000',
                        ],
                        'summary' => 'Order stuck in pending',
                        'timetracking' => [
                            'originalEstimate' => '15',
                            'remainingEstimate' => '5',
                        ],
                        'versions' => [
                            [
                                'id' => '10000',
                            ],
                        ],
                    ],
                    'update' => [
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssuesUpdateBean`](/docs/schema/issues-update-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `issueUpdates` | [`?list<IssueUpdateDetails>`](/docs/schema/issue-update-details.md) |  |

#### Response

Source: [`Jira\Client\Schema\CreatedIssues`](/docs/schema/created-issues.md)

Details about the issues created and the errors for requests that failed.

| Property | Type | Description |
| --- | --- | --- |
| `errors` | [`?list<BulkOperationErrorResult>`](/docs/schema/bulk-operation-error-result.md) | Error details for failed issue creation requests. |
| `issues` | [`?list<CreatedIssue>`](/docs/schema/created-issue.md) | Details of the issues created. |


## Bulk Fetch Issues
<a name="bulkFetchIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-bulkfetch-post

Returns the details for a set of requested issues.
You can request up to 100 issues

Each issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed.
If a matching issue is found its details are returned, a 302 or other redirect is **not** returned

Issues will be returned in ascending `id` order.
If there are errors, Jira will return a list of issues which couldn't be fetched along with error messages

This operation can be accessed anonymously

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\BulkIssueResults $response */
$response = $client->bulkFetchIssues(new Schema\BulkFetchIssueRequestBean(
    expand: [
                'names',
            ],
    fields: [
                'summary',
                'project',
                'assignee',
            ],
    fieldsByKeys: false,
    issueIdsOrKeys: [
                'EX-1',
                'EX-2',
                '10005',
            ],
    properties: [
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkFetchIssueRequestBean`](/docs/schema/bulk-fetch-issue-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `list<string>` | An array of issue IDs or issue keys to fetch. You can mix issue IDs and keys in the same query. |
| `expand` | `?list<string>` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version. |
| `fields` | `?list<string>` | A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  Any issue field, prefixed with a minus to exclude.<br/><br/>The default is `*navigable`.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns the summary and comments fields only.<br/> *  `-description` Returns all navigable (default) fields except description.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>Multiple `fields` parameters can be included in a request.<br/><br/>Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `fieldsByKeys` | `bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `properties` | `?list<string>` | A list of issue property keys of issue properties to be included in the results. A maximum of 5 issue property keys can be specified. |

#### Response

Source: [`Jira\Client\Schema\BulkIssueResults`](/docs/schema/bulk-issue-results.md)

The list of requested issues & fields.

| Property | Type | Description |
| --- | --- | --- |
| `issueErrors` | [`?list<IssueError>`](/docs/schema/issue-error.md) | When Jira can't return an issue enumerated in a request due to a retriable error or payload constraint, we'll return the respective issue ID with a corresponding error message. This list is empty when there are no errors Issues which aren't found or that the user doesn't have permission to view won't be returned in this list. |
| `issues` | [`?list<IssueBean>`](/docs/schema/issue-bean.md) | The list of issues. |


## Get Create Issue Metadata
<a name="getCreateIssueMeta"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-createmeta-get

Returns details of projects, issue types within projects, and, when requested, the create screen fields for each issue type for the user.
Use the information to populate the requests in " Create issue" and "Create issues"

Deprecated, see "Create Issue Meta Endpoint Deprecation Notice"

The request can be restricted to specific projects or issue types using the query parameters.
The response will contain information for the valid projects, issue types, or project and issue type combinations requested.
Note that invalid project, issue type, or project and issue type combinations do not generate errors

This operation can be accessed anonymously

**"Permissions" required:** *Create issues* "project permission" in the requested projects.
See: https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-1304
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\IssueCreateMetadata $response */
$response = $client->getCreateIssueMeta(
    projectIds: null,
    projectKeys: null,
    issuetypeIds: null,
    issuetypeNames: null,
    expand: 'projects.issuetypes.fields',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIds` | `?list<string>` | List of project IDs. This parameter accepts a comma-separated list. Multiple project IDs can also be provided using an ampersand-separated list. For example, `projectIds=10000,10001&projectIds=10020,10021`. This parameter may be provided with `projectKeys`. |
| `projectKeys` | `?list<string>` | List of project keys. This parameter accepts a comma-separated list. Multiple project keys can also be provided using an ampersand-separated list. For example, `projectKeys=proj1,proj2&projectKeys=proj3`. This parameter may be provided with `projectIds`. |
| `issuetypeIds` | `?list<string>` | List of issue type IDs. This parameter accepts a comma-separated list. Multiple issue type IDs can also be provided using an ampersand-separated list. For example, `issuetypeIds=10000,10001&issuetypeIds=10020,10021`. This parameter may be provided with `issuetypeNames`. |
| `issuetypeNames` | `?list<string>` | List of issue type names. This parameter accepts a comma-separated list. Multiple issue type names can also be provided using an ampersand-separated list. For example, `issuetypeNames=name1,name2&issuetypeNames=name3`. This parameter may be provided with `issuetypeIds`. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about issue metadata in the response. This parameter accepts `projects.issuetypes.fields`, which returns information about the fields in the issue creation screen for each issue type. Fields hidden from the screen are not returned. Use the information to populate the `fields` and `update` fields in [Create issue](#api-rest-api-3-issue-post) and [Create issues](#api-rest-api-3-issue-bulk-post). |

#### Response

Source: [`Jira\Client\Schema\IssueCreateMetadata`](/docs/schema/issue-create-metadata.md)

The wrapper for the issue creation metadata for a list of projects.

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `projects` | [`?list<ProjectIssueCreateMetadata>`](/docs/schema/project-issue-create-metadata.md) | List of projects and their issue creation metadata. |


## Get Create Metadata Issue Types For A Project
<a name="getCreateIssueMetaIssueTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-createmeta-project-id-or-key-issuetypes-get

Returns a page of issue type metadata for a specified project.
Use the information to populate the requests in " Create issue" and "Create issues"

This operation can be accessed anonymously

**"Permissions" required:** *Create issues* "project permission" in the requested projects.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageOfCreateMetaIssueTypes $response */
$response = $client->getCreateIssueMetaIssueTypes(
    projectIdOrKey: 'foo',
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or key of the project. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageOfCreateMetaIssueTypes`](/docs/schema/page-of-create-meta-issue-types.md)

A page of CreateMetaIssueTypes.

| Property | Type | Description |
| --- | --- | --- |
| `createMetaIssueType` | [`?list<IssueTypeIssueCreateMetadata>`](/docs/schema/issue-type-issue-create-metadata.md) |  |
| `issueTypes` | [`?list<IssueTypeIssueCreateMetadata>`](/docs/schema/issue-type-issue-create-metadata.md) | The list of CreateMetaIssueType. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The total number of items in all pages. |


## Get Create Field Metadata For A Project And Issue Type Id
<a name="getCreateIssueMetaIssueTypeId"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-createmeta-project-id-or-key-issuetypes-issue-type-id-get

Returns a page of field metadata for a specified project and issuetype id.
Use the information to populate the requests in " Create issue" and "Create issues"

This operation can be accessed anonymously

**"Permissions" required:** *Create issues* "project permission" in the requested projects.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageOfCreateMetaIssueTypeWithField $response */
$response = $client->getCreateIssueMetaIssueTypeId(
    projectIdOrKey: 'foo',
    issueTypeId: 'foo',
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or key of the project. |
| `issueTypeId` | `string` | The issuetype ID. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageOfCreateMetaIssueTypeWithField`](/docs/schema/page-of-create-meta-issue-type-with-field.md)

A page of CreateMetaIssueType with Field.

| Property | Type | Description |
| --- | --- | --- |
| `fields` | [`?list<FieldCreateMetadata>`](/docs/schema/field-create-metadata.md) | The collection of FieldCreateMetaBeans. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `results` | [`?list<FieldCreateMetadata>`](/docs/schema/field-create-metadata.md) |  |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The total number of items in all pages. |


## Get Issue Limit Report
<a name="getIssueLimitReport"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-limit-report-get

Returns all issues breaching and approaching per-issue limits

**"Permissions" required:**

 - *Browse projects* "project permission" is required for the project the issues are in.
Results may be incomplete otherwise
 - *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueLimitReportResponseBean $response */
$response = $client->getIssueLimitReport(
    isReturningKeys: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `isReturningKeys` | `?bool` | Return issue keys instead of issue ids in the response.<br/><br/>Usage: Add `?isReturningKeys=true` to the end of the path to request issue keys. |

#### Response

Source: [`Jira\Client\Schema\IssueLimitReportResponseBean`](/docs/schema/issue-limit-report-response-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `issuesApproachingLimit` | `array<string,int>` | A list of ids of issues approaching the limit and their field count |
| `issuesBreachingLimit` | `array<string,int>` | A list of ids of issues breaching the limit and their field count |
| `limits` | `array<string,int>` | The fields and their defined limits |


## Unarchive Issue(s) By Issue Keys/ID
<a name="unarchiveIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-unarchive-put

Enables admins to unarchive up to 1000 issues in a single request using issue ID/key, returning details of the issue(s) unarchived in the process and the errors encountered, if any

**Note that:**

 - you can't unarchive subtasks directly, only through their parent issues
 - you can only unarchive issues from software, service management, and business projects

**"Permissions" required:** Jira admin or site admin: "global permission"

**License required:** Premium or Enterprise

**Signed-in users only:** This API can't be accessed anonymously

  
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueArchivalSyncResponse $response */
$response = $client->unarchiveIssues(new Schema\IssueArchivalSyncRequest(
    issueIdsOrKeys: [
                'PR-1',
                '1001',
                'PROJECT-2',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueArchivalSyncRequest`](/docs/schema/issue-archival-sync-request.md)

List of Issue Ids Or Keys that are to be archived or unarchived

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `?list<string>` |  |

#### Response

Source: [`Jira\Client\Schema\IssueArchivalSyncResponse`](/docs/schema/issue-archival-sync-response.md)

Number of archived/unarchived issues and list of errors that occurred during the action, if any.

| Property | Type | Description |
| --- | --- | --- |
| `errors` | [`Errors`](/docs/schema/errors.md) |  |
| `numberOfIssuesUpdated` | `int` |  |


## Get Issue
<a name="getIssue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-get

Returns the details for an issue

The issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed.
If a matching issue is found its details are returned, a 302 or other redirect is **not** returned.
The issue key returned in the response is the key of the issue found

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\IssueBean $response */
$response = $client->getIssue(
    issueIdOrKey: 'foo',
    fields: null,
    fieldsByKeys: false,
    expand: null,
    properties: null,
    updateHistory: false,
    failFast: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `fields` | `?list<string>` | A list of fields to return for the issue. This parameter accepts a comma-separated list. Use it to retrieve a subset of fields. Allowed values:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  Any issue field, prefixed with a minus to exclude.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns only the summary and comments fields.<br/> *  `-description` Returns all (default) fields except description.<br/> *  `*navigable,-comment` Returns all navigable fields except comment.<br/><br/>This parameter may be specified multiple times. For example, `fields=field1,field2& fields=field3`.<br/><br/>Note: All fields are returned by default. This differs from [Search for issues using JQL (GET)](#api-rest-api-3-search-get) and [Search for issues using JQL (POST)](#api-rest-api-3-search-post) where the default is all navigable fields. |
| `fieldsByKeys` | `?bool` | Whether fields in `fields` are referenced by keys rather than IDs. This parameter is useful where fields have been added by a connect app and a field's key may differ from its ID. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about the issues in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Returns a JSON array for each version of a field's value, with the highest number representing the most recent version. Note: When included in the request, the `fields` parameter is ignored. |
| `properties` | `?list<string>` | A list of issue properties to return for the issue. This parameter accepts a comma-separated list. Allowed values:<br/><br/> *  `*all` Returns all issue properties.<br/> *  Any issue property key, prefixed with a minus to exclude.<br/><br/>Examples:<br/><br/> *  `*all` Returns all properties.<br/> *  `*all,-prop1` Returns all properties except `prop1`.<br/> *  `prop1,prop2` Returns `prop1` and `prop2` properties.<br/><br/>This parameter may be specified multiple times. For example, `properties=prop1,prop2& properties=prop3`. |
| `updateHistory` | `?bool` | Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. This also populates the [JQL issues search](#api-rest-api-3-search-get) `lastViewed` field. |
| `failFast` | `?bool` | Whether to fail the request quickly in case of an error while loading fields for an issue. For `failFast=true`, if one field fails, the entire operation fails. For `failFast=false`, the operation will continue even if a field fails. It will return a valid response, but without values for the failed field(s). |

#### Response

Source: [`Jira\Client\Schema\IssueBean`](/docs/schema/issue-bean.md)

Details about an issue.

| Property | Type | Description |
| --- | --- | --- |
| `changelog` | [`PageOfChangelogs`](/docs/schema/page-of-changelogs.md) | Details of changelogs associated with the issue. |
| `editmeta` | [`IssueUpdateMetadata`](/docs/schema/issue-update-metadata.md) | The metadata for the fields on the issue that can be amended. |
| `expand` | `string` | Expand options that include additional issue details in the response. |
| `fields` | `array<string,mixed>` |  |
| `fieldsToInclude` | [`IncludedFields`](/docs/schema/included-fields.md) |  |
| `id` | `string` | The ID of the issue. |
| `key` | `string` | The key of the issue. |
| `names` | `array<string,string>` | The ID and name of each field present on the issue. |
| `operations` | [`Operations`](/docs/schema/operations.md) | The operations that can be performed on the issue. |
| `properties` | `array<string,mixed>` | Details of the issue properties identified in the request. |
| `renderedFields` | `array<string,mixed>` | The rendered value of each field present on the issue. |
| `schema` | [`array<string,JsonTypeBean>`](/docs/schema/json-type-bean.md) | The schema describing each field present on the issue. |
| `self` | `string` | The URL of the issue details. |
| `transitions` | [`?list<IssueTransition>`](/docs/schema/issue-transition.md) | The transitions that can be performed on the issue. |
| `versionedRepresentations` | `array<string,object>` | The versions of each field on the issue. |


## Edit Issue
<a name="editIssue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-put

Edits an issue.
Issue properties may be updated as part of the edit.
Please note that issue transition is not supported and is ignored here.
To transition an issue, please use "Transition issue"

The edits to the issue's fields are defined using `update` and `fields`.
The fields that can be edited are determined using " Get edit issue metadata"

The parent field may be set by key or ID.
For standard issue types, the parent may be removed by setting `update.parent.set.none` to *true*.
Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content.
Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content

Connect apps having an app user with *Administer Jira* "global permission", and Forge apps acting on behalf of users with *Administer Jira* "global permission", can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Edit issues* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueUpdateDetails`](/docs/schema/issue-update-details.md)

Details of an issue update request.

| Property | Type | Description |
| --- | --- | --- |
| `fields` | `array<string,mixed>` | List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`. |
| `historyMetadata` | [`HistoryMetadata`](/docs/schema/history-metadata.md) | Additional issue history details. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of issue properties to be add or update. |
| `transition` | [`IssueTransition`](/docs/schema/issue-transition.md) | Details of a transition. Required when performing a transition, optional when creating or editing an issue. |
| `update` | [`array<string,FieldUpdateOperation>`](/docs/schema/field-update-operation.md) | A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `notifyUsers` | `?bool` | Whether a notification email about the issue update is sent to all watchers. To disable the notification, administer Jira or administer project permissions are required. If the user doesn't have the necessary permission the request is ignored. |
| `overrideScreenSecurity` | `?bool` | Whether screen security is overridden to enable hidden fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |
| `overrideEditableFlag` | `?bool` | Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |
| `returnIssue` | `?bool` | Whether the response should contain the issue with fields edited in this request. The returned issue will have the same format as in the [Get issue API](#api-rest-api-3-issue-issueidorkey-get). |
| `expand` | `?string` | The Get issue API expand parameter to use in the response if the `returnIssue` parameter is `true`. |

#### Response

`true`
## Delete Issue
<a name="deleteIssue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-delete

Deletes an issue

An issue cannot be deleted if it has one or more subtasks.
To delete an issue with subtasks, set `deleteSubtasks`.
This causes the issue's subtasks to be deleted with the issue

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Delete issues* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssue(
    issueIdOrKey: 'foo',
    deleteSubtasks: 'false',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `deleteSubtasks` | `'true'\|'false'\|null` | Whether the issue's subtasks are deleted when the issue is deleted. |

#### Response

`true`
## Assign Issue
<a name="assignIssue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-assignee-put

Assigns an issue to a user.
Use this operation when the calling user does not have the *Edit Issues* permission but has the *Assign issue* permission for the project that the issue is in

If `name` or `accountId` is set to:

 - `"-1"`, the issue is assigned to the default assignee for the project
 - `null`, the issue is set to unassigned

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse Projects* and *Assign Issues* " project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->assignIssue(
    request: new Schema\User(
        accountId: '5b10ac8d82e05b22cc7d4ef5',
    )
    issueIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\User`](/docs/schema/user.md)

A user with details as permitted by the user's Atlassian Account privacy settings.
However, be aware of these exceptions:

 - User record deleted from Atlassian: This occurs as the result of a right to be forgotten request.
In this case, `displayName` provides an indication and other parameters have default values or are blank (for example, email is blank)
 - User record corrupted: This occurs as a results of events such as a server import and can only happen to deleted users.
In this case, `accountId` returns *unknown* and all other parameters have fallback values
 - User record unavailable: This usually occurs due to an internal service outage.
In this case, all parameters have fallback values.

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests. |
| `accountType` | `'atlassian'\|`<br/>`'app'\|`<br/>`'customer'\|`<br/>`'unknown'\|`<br/>`null` | The user account type. Can take the following values:<br/><br/> *  `atlassian` regular Atlassian user account<br/> *  `app` system account used for Connect applications and OAuth to represent external systems<br/> *  `customer` Jira Service Desk account representing an external service desk |
| `active` | `bool` | Whether the user is active. |
| `applicationRoles` | [`SimpleListWrapperApplicationRole`](/docs/schema/simple-list-wrapper-application-role.md) | The application roles the user is assigned to. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The avatars of the user. |
| `displayName` | `string` | The display name of the user. Depending on the user’s privacy setting, this may return an alternative value. |
| `emailAddress` | `string` | The email address of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `expand` | `string` | Expand options that include additional user details in the response. |
| `groups` | [`SimpleListWrapperGroupName`](/docs/schema/simple-list-wrapper-group-name.md) | The groups that the user belongs to. |
| `key` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `locale` | `string` | The locale of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `name` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `self` | `string` | The URL of the user. |
| `timeZone` | `string` | The time zone specified in the user's profile. If the user's time zone is not visible to the current user (due to user's profile setting), or if a time zone has not been set, the instance's default time zone will be returned. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue to be assigned. |

#### Response

`true`
## Get Changelogs
<a name="getChangeLogs"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-changelog-get

Returns a "paginated" list of all changelogs for an issue sorted by date, starting from the oldest

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\PageBeanChangelog $response */
$response = $client->getChangeLogs(
    issueIdOrKey: 'foo',
    startAt: 0,
    maxResults: 100,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanChangelog`](/docs/schema/page-bean-changelog.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Changelog>`](/docs/schema/changelog.md) | The list of items. |


## Get Changelogs By IDs
<a name="getChangeLogsByIds"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-changelog-list-post

Returns changelogs for an issue specified by a list of changelog IDs

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PageOfChangelogs $response */
$response = $client->getChangeLogsByIds(
    request: new Schema\IssueChangelogIds(
        changelogIds: [
                '10001',
                '10002',
            ],
    )
    issueIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueChangelogIds`](/docs/schema/issue-changelog-ids.md)

A list of changelog IDs.

| Property | Type | Description |
| --- | --- | --- |
| `changelogIds` | `list<int>` | The list of changelog IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

Source: [`Jira\Client\Schema\PageOfChangelogs`](/docs/schema/page-of-changelogs.md)

A page of changelogs.

| Property | Type | Description |
| --- | --- | --- |
| `histories` | [`?list<Changelog>`](/docs/schema/changelog.md) | The list of changelogs. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |


## Get Edit Issue Metadata
<a name="getEditIssueMeta"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-editmeta-get

Returns the edit screen fields for an issue that are visible to and editable by the user.
Use the information to populate the requests in "Edit issue"

This endpoint will check for these conditions:

1.
 Field is available on a field screen - through screen, screen scheme, issue type screen scheme, and issue type scheme configuration.
`overrideScreenSecurity=true` skips this condition
2.
 Field is visible in the "field configuration".
`overrideScreenSecurity=true` skips this condition
3.
 Field is shown on the issue: each field has different conditions here.
For example: Attachment field only shows if attachments are enabled.
Assignee only shows if user has permissions to assign the issue
4.
 If a field is custom then it must have valid custom field context, applicable for its project and issue type.
All system fields are assumed to have context in all projects and all issue types
5.
 Issue has a project, issue type, and status defined
6.
 Issue is assigned to a valid workflow, and the current status has assigned a workflow step.
`overrideEditableFlag=true` skips this condition
7.
 The current workflow step is editable.
This is true by default, but "can be disabled by setting" the `jira.issue.editable` property to `false`.
`overrideEditableFlag=true` skips this condition
8.
 User has "Edit issues permission"
9.
 Workflow permissions allow editing a field.
This is true by default but "can be modified" using `jira.permission.*` workflow properties

Fields hidden using "Issue layout settings page" remain editable

Connect apps having an app user with *Administer Jira* "global permission", and Forge apps acting on behalf of users with *Administer Jira* "global permission", can return additional details using:

 - `overrideScreenSecurity` When this flag is `true`, then this endpoint skips checking if fields are available through screens, and field configuration (conditions 1.
and 2.
from the list above)
 - `overrideEditableFlag` When this flag is `true`, then this endpoint skips checking if workflow is present and if the current step is editable (conditions 6.
and 7.
from the list above)

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue

Note: For any fields to be editable the user must have the *Edit issues* "project permission" for the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/change-a-field-configuration/
See: https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/
See: https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/
See: https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/
See: https://support.atlassian.com/jira-software-cloud/docs/configure-field-layout-in-the-issue-view/
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\IssueUpdateMetadata $response */
$response = $client->getEditIssueMeta(
    issueIdOrKey: 'foo',
    overrideScreenSecurity: false,
    overrideEditableFlag: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `overrideScreenSecurity` | `?bool` | Whether hidden fields are returned. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |
| `overrideEditableFlag` | `?bool` | Whether non-editable fields are returned. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |

#### Response

Source: [`Jira\Client\Schema\IssueUpdateMetadata`](/docs/schema/issue-update-metadata.md)

A list of editable field details.

| Property | Type | Description |
| --- | --- | --- |
| `fields` | [`array<string,FieldMetadata>`](/docs/schema/field-metadata.md) |  |


## Send Notification For Issue
<a name="notify"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-notify-post

Creates an email notification for an issue and adds it to the mail queue

**"Permissions" required:**

 - *Browse Projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->notify(
    request: new Schema\Notification(
        htmlBody: 'The <strong>latest</strong> test results for this ticket are now available.',
        restrict: [
                'groupIds' => [
                ],
                'groups' => [
                    0 => [
                        'name' => 'notification-group',
                    ],
                ],
                'permissions' => [
                    0 => [
                        'key' => 'BROWSE',
                    ],
                ],
            ],
        subject: 'Latest test results',
        textBody: 'The latest test results for this ticket are now available.',
        to: [
                'assignee' => '',
                'groupIds' => [
                ],
                'groups' => [
                    0 => [
                        'name' => 'notification-group',
                    ],
                ],
                'reporter' => '',
                'users' => [
                    0 => [
                        'accountId' => '5b10a2844c20165700ede21g',
                        'active' => '',
                    ],
                ],
                'voters' => '1',
                'watchers' => '1',
            ],
    )
    issueIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Notification`](/docs/schema/notification.md)

Details about a notification.

| Property | Type | Description |
| --- | --- | --- |
| `htmlBody` | `string` | The HTML body of the email notification for the issue. |
| `restrict` | [`NotificationRecipientsRestrictions`](/docs/schema/notification-recipients-restrictions.md) | Restricts the notifications to users with the specified permissions. |
| `subject` | `string` | The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary. |
| `textBody` | `string` | The plain text body of the email notification for the issue. |
| `to` | [`NotificationRecipients`](/docs/schema/notification-recipients.md) | The recipients of the email notification for the issue. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | ID or key of the issue that the notification is sent for. |

#### Response

`true`
## Get Transitions
<a name="getTransitions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-transitions-get

Returns either all transitions or a transition that can be performed by the user on an issue, based on the issue's status

Note, if a request is made for a transition that does not exist or cannot be performed on the issue, given its status, the response will return any empty transitions list

This operation can be accessed anonymously

**"Permissions" required: A list or transition is returned only when the user has:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue

However, if the user does not have the *Transition issues* " project permission" the response will not list any transitions.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Transitions $response */
$response = $client->getTransitions(
    issueIdOrKey: 'foo',
    expand: null,
    transitionId: null,
    skipRemoteOnlyCondition: false,
    includeUnavailableTransitions: false,
    sortByOpsBarAndStatus: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about transitions in the response. This parameter accepts `transitions.fields`, which returns information about the fields in the transition screen for each transition. Fields hidden from the screen are not returned. Use this information to populate the `fields` and `update` fields in [Transition issue](#api-rest-api-3-issue-issueIdOrKey-transitions-post). |
| `transitionId` | `?string` | The ID of the transition. |
| `skipRemoteOnlyCondition` | `?bool` | Whether transitions with the condition *Hide From User Condition* are included in the response. |
| `includeUnavailableTransitions` | `?bool` | Whether details of transitions that fail a condition are included in the response |
| `sortByOpsBarAndStatus` | `?bool` | Whether the transitions are sorted by ops-bar sequence value first then category order (Todo, In Progress, Done) or only by ops-bar sequence value. |

#### Response

Source: [`Jira\Client\Schema\Transitions`](/docs/schema/transitions.md)

List of issue transitions.

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional transitions details in the response. |
| `transitions` | [`?list<IssueTransition>`](/docs/schema/issue-transition.md) | List of issue transitions. |


## Transition Issue
<a name="doTransition"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issue-issue-id-or-key-transitions-post

Performs an issue transition and, if the transition has a screen, updates the fields from the transition screen

sortByCategory To update the fields on the transition screen, specify the fields in the `fields` or `update` parameters in the request body.
Get details about the fields using " Get transitions" with the `transitions.fields` expand

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Transition issues* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->doTransition(
    request: new Schema\IssueUpdateDetails(
        fields: [
                'assignee' => [
                    'name' => 'bob',
                ],
                'resolution' => [
                    'name' => 'Fixed',
                ],
            ],
        historyMetadata: [
                'activityDescription' => 'Complete order processing',
                'actor' => [
                    'avatarUrl' => 'http://mysystem/avatar/tony.jpg',
                    'displayName' => 'Tony',
                    'id' => 'tony',
                    'type' => 'mysystem-user',
                    'url' => 'http://mysystem/users/tony',
                ],
                'cause' => [
                    'id' => 'myevent',
                    'type' => 'mysystem-event',
                ],
                'description' => 'From the order testing process',
                'extraData' => [
                    'Iteration' => '10a',
                    'Step' => '4',
                ],
                'generator' => [
                    'id' => 'mysystem-1',
                    'type' => 'mysystem-application',
                ],
                'type' => 'myplugin:type',
            ],
        transition: [
                'id' => '5',
            ],
        update: [
                'comment' => [
                    0 => [
                        'add' => [
                            'body' => [
                                'content' => [
                                    0 => [
                                        'content' => [
                                            0 => [
                                                'text' => 'Bug has been fixed',
                                                'type' => 'text',
                                            ],
                                        ],
                                        'type' => 'paragraph',
                                    ],
                                ],
                                'type' => 'doc',
                                'version' => '1',
                            ],
                        ],
                    ],
                ],
            ],
    )
    issueIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueUpdateDetails`](/docs/schema/issue-update-details.md)

Details of an issue update request.

| Property | Type | Description |
| --- | --- | --- |
| `fields` | `array<string,mixed>` | List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`. |
| `historyMetadata` | [`HistoryMetadata`](/docs/schema/history-metadata.md) | Additional issue history details. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of issue properties to be add or update. |
| `transition` | [`IssueTransition`](/docs/schema/issue-transition.md) | Details of a transition. Required when performing a transition, optional when creating or editing an issue. |
| `update` | [`array<string,FieldUpdateOperation>`](/docs/schema/field-update-operation.md) | A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

`true`
## Export Archived Issue(s)
<a name="exportArchivedIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issues/#api-rest-api-3-issues-archive-export-put

Enables admins to retrieve details of all archived issues.
Upon a successful request, the admin who submitted it will receive an email with a link to download a CSV file with the issue details

Note that this API only exports the values of system fields and archival-specific fields (`ArchivedBy` and `ArchivedDate`).
Custom fields aren't supported

**"Permissions" required:** Jira admin or site admin: "global permission"

**License required:** Premium or Enterprise

**Signed-in users only:** This API can't be accessed anonymously

**Rate limiting:** Only a single request can be active at any given time

  
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ExportArchivedIssuesTaskProgressResponse $response */
$response = $client->exportArchivedIssues(new Schema\ArchivedIssuesFilterRequest(
    archivedBy: [
                'uuid-rep-001',
                'uuid-rep-002',
            ],
    archivedDate: [
                'dateAfter' => '2023-01-01',
                'dateBefore' => '2023-01-12',
            ],
    archivedDateRange: [
                'dateAfter' => '2023-01-01',
                'dateBefore' => '2023-01-12',
            ],
    issueTypes: [
                '10001',
                '10002',
            ],
    projects: [
                'FOO',
                'BAR',
            ],
    reporters: [
                'uuid-rep-001',
                'uuid-rep-002',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ArchivedIssuesFilterRequest`](/docs/schema/archived-issues-filter-request.md)

Details of a filter for exporting archived issues.

| Property | Type | Description |
| --- | --- | --- |
| `archivedBy` | `?list<string>` | List archived issues archived by a specified account ID. |
| `archivedDateRange` | [`DateRangeFilterRequest`](/docs/schema/date-range-filter-request.md) |  |
| `issueTypes` | `?list<string>` | List archived issues with a specified issue type ID. |
| `projects` | `?list<string>` | List archived issues with a specified project key. |
| `reporters` | `?list<string>` | List archived issues where the reporter is a specified account ID. |

#### Response

Source: [`Jira\Client\Schema\ExportArchivedIssuesTaskProgressResponse`](/docs/schema/export-archived-issues-task-progress-response.md)

The response for status request for a running/completed export task.

| Property | Type | Description |
| --- | --- | --- |
| `fileUrl` | `string` |  |
| `payload` | `string` |  |
| `progress` | `int` |  |
| `status` | `string` |  |
| `submittedTime` | `string` |  |
| `taskId` | `string` |  |
