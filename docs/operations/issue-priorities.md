# Issue Priorities

DummyDescription

Source: [`Jira\Client\Operations\IssuePriorities`](/src/Operations/IssuePriorities.php)

## Operations

- [Get Priorities](#getPriorities)
- [Create Priority](#createPriority)
- [Set Default Priority](#setDefaultPriority)
- [Move Priorities](#movePriorities)
- [Search Priorities](#searchPriorities)
- [Get Priority](#getPriority)
- [Update Priority](#updatePriority)
- [Delete Priority](#deletePriority)

## Get Priorities
<a name="getPriorities"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-get

Returns the list of all issue priorities

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var array $response */
$response = $client->getPriorities();
```

### Request

#### Response


## Create Priority
<a name="createPriority"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-post

Creates an issue priority

Deprecation applies to iconUrl param in request body which will be sunset on 16th Mar 2025.
For more details refer to "changelog"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/changelog/#CHANGE-1525
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PriorityId $response */
$response = $client->createPriority(new Schema\CreatePriorityDetails(
    description: 'My priority description',
    iconUrl: 'images/icons/priorities/major.png',
    name: 'My new priority',
    statusColor: '#ABCDEF',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreatePriorityDetails`](/docs/schema/create-priority-details.md)

Details of an issue priority.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the priority. Must be unique. |
| `statusColor` | `string` | The status color of the priority in 3-digit or 6-digit hexadecimal format. |
| `avatarId` | `int` | The ID for the avatar for the priority. Either the iconUrl or avatarId must be defined, but not both. This parameter is nullable and will become mandatory once the iconUrl parameter is deprecated. |
| `description` | `string` | The description of the priority. |
| `iconUrl` | `'/images/icons/priorities/blocker.png'\|`<br/>`'/images/icons/priorities/critical.png'\|`<br/>`'/images/icons/priorities/high.png'\|`<br/>`'/images/icons/priorities/highest.png'\|`<br/>`'/images/icons/priorities/low.png'\|`<br/>`'/images/icons/priorities/lowest.png'\|`<br/>`'/images/icons/priorities/major.png'\|`<br/>`'/images/icons/priorities/medium.png'\|`<br/>`'/images/icons/priorities/minor.png'\|`<br/>`'/images/icons/priorities/trivial.png'\|`<br/>`'/images/icons/priorities/blocker_new.png'\|`<br/>`'/images/icons/priorities/critical_new.png'\|`<br/>`'/images/icons/priorities/high_new.png'\|`<br/>`'/images/icons/priorities/highest_new.png'\|`<br/>`'/images/icons/priorities/low_new.png'\|`<br/>`'/images/icons/priorities/lowest_new.png'\|`<br/>`'/images/icons/priorities/major_new.png'\|`<br/>`'/images/icons/priorities/medium_new.png'\|`<br/>`'/images/icons/priorities/minor_new.png'\|`<br/>`'/images/icons/priorities/trivial_new.png'\|`<br/>`null` | The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used. Either the iconUrl or avatarId must be defined, but not both. |

#### Response

Source: [`Jira\Client\Schema\PriorityId`](/docs/schema/priority-id.md)

The ID of an issue priority.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue priority. |


## Set Default Priority
<a name="setDefaultPriority"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-default-put

Sets default issue priority

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setDefaultPriority(new Schema\SetDefaultPriorityRequest(
    id: '3',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SetDefaultPriorityRequest`](/docs/schema/set-default-priority-request.md)

The new default issue priority.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the new default issue priority. Must be an existing ID or null. Setting this to null erases the default priority setting. |

#### Response

`true`
## Move Priorities
<a name="movePriorities"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-move-put

Changes the order of issue priorities

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->movePriorities(new Schema\ReorderIssuePriorities(
    after: '10003',
    ids: [
                '10004',
                '10005',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ReorderIssuePriorities`](/docs/schema/reorder-issue-priorities.md)

Change the order of issue priorities.

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `list<string>` | The list of issue IDs to be reordered. Cannot contain duplicates nor after ID. |
| `after` | `string` | The ID of the priority. Required if `position` isn't provided. |
| `position` | `string` | The position for issue priorities to be moved to. Required if `after` isn't provided. |

#### Response

`true`
## Search Priorities
<a name="searchPriorities"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-search-get

Returns a "paginated" list of priorities.
The list can contain all priorities or a subset determined by any combination of these criteria:

 - a list of priority IDs.
Any invalid priority IDs are ignored
 - a list of project IDs.
Only priorities that are available in these projects will be returned.
Any invalid project IDs are ignored
 - whether the field configuration is a default.
This returns priorities from company-managed (classic) projects only, as there is no concept of default priorities in team-managed projects

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanPriority $response */
$response = $client->searchPriorities(
    startAt: 0,
    maxResults: 50,
    id: null,
    projectId: null,
    priorityName: '',
    onlyDefault: false,
    expand: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `id` | `?list<string>` | The list of priority IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=2&id=3`. |
| `projectId` | `?list<string>` | The list of projects IDs. To include multiple IDs, provide an ampersand-separated list. For example, `projectId=10010&projectId=10111`. |
| `priorityName` | `?string` | The name of priority to search for. |
| `onlyDefault` | `?bool` | Whether only the default priority is returned. |
| `expand` | `?string` | Use `schemes` to return the associated priority schemes for each priority. Limited to returning first 15 priority schemes per priority. |

#### Response

Source: [`Jira\Client\Schema\PageBeanPriority`](/docs/schema/page-bean-priority.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Priority>`](/docs/schema/priority.md) | The list of items. |


## Get Priority
<a name="getPriority"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-id-get

Returns an issue priority

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\Priority $response */
$response = $client->getPriority(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue priority. |

#### Response

Source: [`Jira\Client\Schema\Priority`](/docs/schema/priority.md)

An issue priority.

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The avatarId of the avatar for the issue priority. This parameter is nullable and when set, this avatar references the universal avatar APIs. |
| `description` | `string` | The description of the issue priority. |
| `iconUrl` | `string` | The URL of the icon for the issue priority. |
| `id` | `string` | The ID of the issue priority. |
| `isDefault` | `bool` | Whether this priority is the default. |
| `name` | `string` | The name of the issue priority. |
| `schemes` | [`ExpandPrioritySchemePage`](/docs/schema/expand-priority-scheme-page.md) | Priority schemes associated with the issue priority. |
| `self` | `string` | The URL of the issue priority. |
| `statusColor` | `string` | The color used to indicate the issue priority. |


## Update Priority
<a name="updatePriority"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-id-put

Updates an issue priority

At least one request body parameter must be defined

Deprecation applies to iconUrl param in request body which will be sunset on 16th Mar 2025.
For more details refer to "changelog"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/changelog/#CHANGE-1525
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updatePriority(
    request: new Schema\UpdatePriorityDetails(
        description: 'My updated priority description',
        iconUrl: 'images/icons/priorities/minor.png',
        name: 'My updated priority',
        statusColor: '#123456',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdatePriorityDetails`](/docs/schema/update-priority-details.md)

Details of an issue priority.

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID for the avatar for the priority. This parameter is nullable and both iconUrl and avatarId cannot be defined. |
| `description` | `string` | The description of the priority. |
| `iconUrl` | `'/images/icons/priorities/blocker.png'\|`<br/>`'/images/icons/priorities/critical.png'\|`<br/>`'/images/icons/priorities/high.png'\|`<br/>`'/images/icons/priorities/highest.png'\|`<br/>`'/images/icons/priorities/low.png'\|`<br/>`'/images/icons/priorities/lowest.png'\|`<br/>`'/images/icons/priorities/major.png'\|`<br/>`'/images/icons/priorities/medium.png'\|`<br/>`'/images/icons/priorities/minor.png'\|`<br/>`'/images/icons/priorities/trivial.png'\|`<br/>`'/images/icons/priorities/blocker_new.png'\|`<br/>`'/images/icons/priorities/critical_new.png'\|`<br/>`'/images/icons/priorities/high_new.png'\|`<br/>`'/images/icons/priorities/highest_new.png'\|`<br/>`'/images/icons/priorities/low_new.png'\|`<br/>`'/images/icons/priorities/lowest_new.png'\|`<br/>`'/images/icons/priorities/major_new.png'\|`<br/>`'/images/icons/priorities/medium_new.png'\|`<br/>`'/images/icons/priorities/minor_new.png'\|`<br/>`'/images/icons/priorities/trivial_new.png'\|`<br/>`null` | The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used. Both iconUrl and avatarId cannot be defined. |
| `name` | `string` | The name of the priority. Must be unique. |
| `statusColor` | `string` | The status color of the priority in 3-digit or 6-digit hexadecimal format. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue priority. |

#### Response

`true`
## Delete Priority
<a name="deletePriority"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-priorities/#api-rest-api-3-priority-id-delete

Deletes an issue priority

This operation is "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue priority. |

#### Response

Source: [`Jira\Client\Schema\TaskProgressBeanObject`](/docs/schema/task-progress-bean-object.md)

Details about a task.

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `int` | The execution time of the task, in milliseconds. |
| `id` | `string` | The ID of the task. |
| `lastUpdate` | `int` | A timestamp recording when the task progress was last updated. |
| `progress` | `int` | The progress of the task, as a percentage complete. |
| `self` | `string` | The URL of the task. |
| `status` | `'ENQUEUED'\|`<br/>`'RUNNING'\|`<br/>`'COMPLETE'\|`<br/>`'FAILED'\|`<br/>`'CANCEL_REQUESTED'\|`<br/>`'CANCELLED'\|`<br/>`'DEAD'` | The status of the task. |
| `submitted` | `int` | A timestamp recording when the task was submitted. |
| `submittedBy` | `int` | The ID of the user who submitted the task. |
| `description` | `string` | The description of the task. |
| `finished` | `int` | A timestamp recording when the task was finished. |
| `message` | `string` | Information about the progress of the task. |
| `result` | `mixed` | The result of the task execution. |
| `started` | `int` | A timestamp recording when the task was started. |
