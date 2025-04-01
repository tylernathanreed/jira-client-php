# Issue Worklogs

Source: [`Jira\Client\Operations\IssueWorklogs`](/src/Operations/IssueWorklogs.php)

## Operations

- [Get Issue Worklogs](#getIssueWorklog)
- [Add Worklog](#addWorklog)
- [Bulk Delete Worklogs](#bulkDeleteWorklogs)
- [Bulk Move Worklogs](#bulkMoveWorklogs)
- [Get Worklog](#getWorklog)
- [Update Worklog](#updateWorklog)
- [Delete Worklog](#deleteWorklog)
- [Get IDs Of Deleted Worklogs](#getIdsOfWorklogsDeletedSince)
- [Get Worklogs](#getWorklogsForIds)
- [Get IDs Of Updated Worklogs](#getIdsOfWorklogsModifiedSince)

## Get Issue Worklogs
<a name="getIssueWorklog"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-get

Returns worklogs for an issue (ordered by created time), starting from the oldest worklog or from the worklog started on or after a date and time

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

This operation can be accessed anonymously

**"Permissions" required:** Workloads are only returned where the user has:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\PageOfWorklogs $response */
$response = $client->getIssueWorklog(
    issueIdOrKey: 'foo',
    startAt: 0,
    maxResults: 5000,
    startedAfter: null,
    startedBefore: null,
    expand: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `startedAfter` | `?int` | The worklog start date and time, as a UNIX timestamp in milliseconds, after which worklogs are returned. |
| `startedBefore` | `?int` | The worklog start date and time, as a UNIX timestamp in milliseconds, before which worklogs are returned. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts`properties`, which returns worklog properties. |

#### Response

Source: [`Jira\Client\Schema\PageOfWorklogs`](/docs/schema/page-of-worklogs.md)

Paginated list of worklog details

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |
| `worklogs` | [`?list<Worklog>`](/docs/schema/worklog.md) | List of worklogs. |


## Add Worklog
<a name="addWorklog"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-post

Adds a worklog to an issue

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Work on issues* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\Worklog`](/docs/schema/worklog.md)

Details of a worklog.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who created the worklog. |
| `comment` | `mixed` | A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog. |
| `created` | `string` | The datetime on which the worklog was created. |
| `id` | `string` | The ID of the worklog record. |
| `issueId` | `string` | The ID of the issue this worklog is for. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of properties for the worklog. Optional when creating or updating a worklog. |
| `self` | `string` | The URL of the worklog item. |
| `started` | `string` | The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog. |
| `timeSpent` | `string` | The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided. |
| `timeSpentSeconds` | `int` | The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who last updated the worklog. |
| `updated` | `string` | The datetime on which the worklog was last updated. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key the issue. |
| `notifyUsers` | `?bool` | Whether users watching the issue are notified by email. |
| `adjustEstimate` | `'new'\|'leave'\|'manual'\|'auto'\|null` | Defines how to update the issue's time estimate, the options are:<br/><br/> *  `new` Sets the estimate to a specific value, defined in `newEstimate`.<br/> *  `leave` Leaves the estimate unchanged.<br/> *  `manual` Reduces the estimate by amount specified in `reduceBy`.<br/> *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog. |
| `newEstimate` | `?string` | The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`. |
| `reduceBy` | `?string` | The amount to reduce the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m). For example, *2d*. Required when `adjustEstimate` is `manual`. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts `properties`, which returns worklog properties. |
| `overrideEditableFlag` | `?bool` | Whether the worklog entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag. |

#### Response

Source: [`Jira\Client\Schema\Worklog`](/docs/schema/worklog.md)

Details of a worklog.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who created the worklog. |
| `comment` | `mixed` | A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog. |
| `created` | `string` | The datetime on which the worklog was created. |
| `id` | `string` | The ID of the worklog record. |
| `issueId` | `string` | The ID of the issue this worklog is for. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of properties for the worklog. Optional when creating or updating a worklog. |
| `self` | `string` | The URL of the worklog item. |
| `started` | `string` | The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog. |
| `timeSpent` | `string` | The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided. |
| `timeSpentSeconds` | `int` | The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who last updated the worklog. |
| `updated` | `string` | The datetime on which the worklog was last updated. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog. |


## Bulk Delete Worklogs
<a name="bulkDeleteWorklogs"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-delete

Deletes a list of worklogs from an issue.
This is an experimental API with limitations:

 - You can't delete more than 5000 worklogs at once
 - No notifications will be sent for deleted worklogs

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

**"Permissions" required:**

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Delete all worklogs*" project permission" to delete any worklog
 - If any worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\WorklogIdsRequestBean`](/docs/schema/worklog-ids-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `list<int>` | A list of worklog IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `adjustEstimate` | `'leave'\|'auto'\|null` | Defines how to update the issue's time estimate, the options are:<br/><br/> *  `leave` Leaves the estimate unchanged.<br/> *  `auto` Reduces the estimate by the aggregate value of `timeSpent` across all worklogs being deleted. |
| `overrideEditableFlag` | `?bool` | Whether the work log entries should be removed to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag. |

#### Response

`true`
## Bulk Move Worklogs
<a name="bulkMoveWorklogs"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-move-post

Moves a list of worklogs from one issue to another.
This is an experimental API with several limitations:

 - You can't move more than 5000 worklogs at once
 - You can't move worklogs containing an attachment
 - You can't move worklogs restricted by project roles
 - No notifications will be sent for moved worklogs
 - No webhooks or events will be sent for moved worklogs
 - No issue history will be recorded for moved worklogs

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

**"Permissions" required:**

 - *Browse projects* "project permission" for the projects containing the source and destination issues
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Delete all worklogs*" and *Edit all worklogs*""project permission"
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\WorklogsMoveRequestBean`](/docs/schema/worklogs-move-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `?list<int>` | A list of worklog IDs. |
| `issueIdOrKey` | `string` | The issue id or key of the destination issue |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` |  |
| `adjustEstimate` | `'leave'\|'auto'\|null` | Defines how to update the issues' time estimate, the options are:<br/><br/> *  `leave` Leaves the estimate unchanged.<br/> *  `auto` Reduces the estimate by the aggregate value of `timeSpent` across all worklogs being moved in the source issue, and increases it in the destination issue. |
| `overrideEditableFlag` | `?bool` | Whether the work log entry should be moved to and from the issues even if the issues are not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag. |

#### Response

`true`
## Get Worklog
<a name="getWorklog"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-id-get

Returns a worklog

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\Worklog $response */
$response = $client->getWorklog(
    issueIdOrKey: 'foo',
    id: 'foo',
    expand: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `id` | `string` | The ID of the worklog. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts<br/><br/>`properties`, which returns worklog properties. |

#### Response

Source: [`Jira\Client\Schema\Worklog`](/docs/schema/worklog.md)

Details of a worklog.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who created the worklog. |
| `comment` | `mixed` | A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog. |
| `created` | `string` | The datetime on which the worklog was created. |
| `id` | `string` | The ID of the worklog record. |
| `issueId` | `string` | The ID of the issue this worklog is for. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of properties for the worklog. Optional when creating or updating a worklog. |
| `self` | `string` | The URL of the worklog item. |
| `started` | `string` | The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog. |
| `timeSpent` | `string` | The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided. |
| `timeSpentSeconds` | `int` | The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who last updated the worklog. |
| `updated` | `string` | The datetime on which the worklog was last updated. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog. |


## Update Worklog
<a name="updateWorklog"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-id-put

Updates a worklog

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Edit all worklogs*" project permission" to update any worklog or *Edit own worklogs* to update worklogs created by the user
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Worklog $response */
$response = $client->updateWorklog(
    request: new Schema\Worklog(
        comment: [
                'content' => [
                    0 => [
                        'content' => [
                            0 => [
                                'text' => 'I did some work here.',
                                'type' => 'text',
                            ],
                        ],
                        'type' => 'paragraph',
                    ],
                ],
                'type' => 'doc',
                'version' => '1',
            ],
        started: '2021-01-17T12:34:00.000+0000',
        timeSpentSeconds: '12000',
        visibility: [
                'identifier' => '276f955c-63d7-42c8-9520-92d01dca0625',
                'type' => 'group',
            ],
    )
    issueIdOrKey: 'foo',
    id: 'foo',
    notifyUsers: true,
    adjustEstimate: 'auto',
    newEstimate: null,
    expand: '',
    overrideEditableFlag: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Worklog`](/docs/schema/worklog.md)

Details of a worklog.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who created the worklog. |
| `comment` | `mixed` | A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog. |
| `created` | `string` | The datetime on which the worklog was created. |
| `id` | `string` | The ID of the worklog record. |
| `issueId` | `string` | The ID of the issue this worklog is for. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of properties for the worklog. Optional when creating or updating a worklog. |
| `self` | `string` | The URL of the worklog item. |
| `started` | `string` | The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog. |
| `timeSpent` | `string` | The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided. |
| `timeSpentSeconds` | `int` | The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who last updated the worklog. |
| `updated` | `string` | The datetime on which the worklog was last updated. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key the issue. |
| `id` | `string` | The ID of the worklog. |
| `notifyUsers` | `?bool` | Whether users watching the issue are notified by email. |
| `adjustEstimate` | `'new'\|'leave'\|'manual'\|'auto'\|null` | Defines how to update the issue's time estimate, the options are:<br/><br/> *  `new` Sets the estimate to a specific value, defined in `newEstimate`.<br/> *  `leave` Leaves the estimate unchanged.<br/> *  `auto` Updates the estimate by the difference between the original and updated value of `timeSpent` or `timeSpentSeconds`. |
| `newEstimate` | `?string` | The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties`, which returns worklog properties. |
| `overrideEditableFlag` | `?bool` | Whether the worklog should be added to the issue even if the issue is not editable. For example, because the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag. |

#### Response

Source: [`Jira\Client\Schema\Worklog`](/docs/schema/worklog.md)

Details of a worklog.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who created the worklog. |
| `comment` | `mixed` | A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog. |
| `created` | `string` | The datetime on which the worklog was created. |
| `id` | `string` | The ID of the worklog record. |
| `issueId` | `string` | The ID of the issue this worklog is for. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of properties for the worklog. Optional when creating or updating a worklog. |
| `self` | `string` | The URL of the worklog item. |
| `started` | `string` | The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog. |
| `timeSpent` | `string` | The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided. |
| `timeSpentSeconds` | `int` | The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | Details of the user who last updated the worklog. |
| `updated` | `string` | The datetime on which the worklog was last updated. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog. |


## Delete Worklog
<a name="deleteWorklog"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-issue-issue-id-or-key-worklog-id-delete

Deletes a worklog from an issue

Time tracking must be enabled in Jira, otherwise this operation returns an error.
For more information, see "Configuring time tracking"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Delete all worklogs*" project permission" to delete any worklog or *Delete own worklogs* to delete worklogs created by the user,
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteWorklog(
    issueIdOrKey: 'foo',
    id: 'foo',
    notifyUsers: true,
    adjustEstimate: 'auto',
    newEstimate: null,
    increaseBy: null,
    overrideEditableFlag: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `id` | `string` | The ID of the worklog. |
| `notifyUsers` | `?bool` | Whether users watching the issue are notified by email. |
| `adjustEstimate` | `'new'\|'leave'\|'manual'\|'auto'\|null` | Defines how to update the issue's time estimate, the options are:<br/><br/> *  `new` Sets the estimate to a specific value, defined in `newEstimate`.<br/> *  `leave` Leaves the estimate unchanged.<br/> *  `manual` Increases the estimate by amount specified in `increaseBy`.<br/> *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog. |
| `newEstimate` | `?string` | The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`. |
| `increaseBy` | `?string` | The amount to increase the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `manual`. |
| `overrideEditableFlag` | `?bool` | Whether the work log entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag. |

#### Response

`true`
## Get IDs Of Deleted Worklogs
<a name="getIdsOfWorklogsDeletedSince"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-worklog-deleted-get

Returns a list of IDs and delete timestamps for worklogs deleted after a date and time

This resource is paginated, with a limit of 1000 worklogs per page.
Each page lists worklogs from oldest to youngest.
If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page.
Also, `nextPage` provides the URL for the next page of worklogs.
The `lastPage` parameter is set to true on the last page of worklogs

This resource does not return worklogs deleted during the minute preceding the request

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\ChangedWorklogs $response */
$response = $client->getIdsOfWorklogsDeletedSince(
    since: 0,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `since` | `?int` | The date and time, as a UNIX timestamp in milliseconds, after which deleted worklogs are returned. |

#### Response

Source: [`Jira\Client\Schema\ChangedWorklogs`](/docs/schema/changed-worklogs.md)

List of changed worklogs.

| Property | Type | Description |
| --- | --- | --- |
| `lastPage` | `bool` |  |
| `nextPage` | `string` | The URL of the next list of changed worklogs. |
| `self` | `string` | The URL of this changed worklogs list. |
| `since` | `int` | The datetime of the first worklog item in the list. |
| `until` | `int` | The datetime of the last worklog item in the list. |
| `values` | [`?list<ChangedWorklog>`](/docs/schema/changed-worklog.md) | Changed worklog list. |


## Get Worklogs
<a name="getWorklogsForIds"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-worklog-list-post

Returns worklog details for a list of worklog IDs

The returned list of worklogs is limited to 1000 items

**"Permissions" required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:

 - the worklog is set as *Viewable by All Users*
 - the user is a member of a project role or group with permission to view the worklog.

### Example

```php
use Jira\Client\Schema;

/** @var array $response */
$response = $client->getWorklogsForIds(
    request: new Schema\WorklogIdsRequestBean(
        ids: [
                '1',
                '2',
                '5',
                '10',
            ],
    )
    expand: '',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorklogIdsRequestBean`](/docs/schema/worklog-ids-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `list<int>` | A list of worklog IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog. |

#### Response


## Get IDs Of Updated Worklogs
<a name="getIdsOfWorklogsModifiedSince"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklogs/#api-rest-api-3-worklog-updated-get

Returns a list of IDs and update timestamps for worklogs updated after a date and time

This resource is paginated, with a limit of 1000 worklogs per page.
Each page lists worklogs from oldest to youngest.
If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page.
Also, `nextPage` provides the URL for the next page of worklogs.
The `lastPage` parameter is set to true on the last page of worklogs

This resource does not return worklogs updated during the minute preceding the request

**"Permissions" required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:

 - the worklog is set as *Viewable by All Users*
 - the user is a member of a project role or group with permission to view the worklog.

### Example

```php
/** @var Schema\ChangedWorklogs $response */
$response = $client->getIdsOfWorklogsModifiedSince(
    since: 0,
    expand: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `since` | `?int` | The date and time, as a UNIX timestamp in milliseconds, after which updated worklogs are returned. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog. |

#### Response

Source: [`Jira\Client\Schema\ChangedWorklogs`](/docs/schema/changed-worklogs.md)

List of changed worklogs.

| Property | Type | Description |
| --- | --- | --- |
| `lastPage` | `bool` |  |
| `nextPage` | `string` | The URL of the next list of changed worklogs. |
| `self` | `string` | The URL of this changed worklogs list. |
| `since` | `int` | The datetime of the first worklog item in the list. |
| `until` | `int` | The datetime of the last worklog item in the list. |
| `values` | [`?list<ChangedWorklog>`](/docs/schema/changed-worklog.md) | Changed worklog list. |
