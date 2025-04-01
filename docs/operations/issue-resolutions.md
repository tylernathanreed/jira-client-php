# Issue Resolutions

DummyDescription

Source: [`Jira\Client\Operations\IssueResolutions`](/src/Operations/IssueResolutions.php)

## Operations

- [Get Resolutions](#getResolutions)
- [Create Resolution](#createResolution)
- [Set Default Resolution](#setDefaultResolution)
- [Move Resolutions](#moveResolutions)
- [Search Resolutions](#searchResolutions)
- [Get Resolution](#getResolution)
- [Update Resolution](#updateResolution)
- [Delete Resolution](#deleteResolution)

## Get Resolutions
<a name="getResolutions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-get

Returns a list of all issue resolution values

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var array $response */
$response = $client->getResolutions();
```

### Request

#### Response


## Create Resolution
<a name="createResolution"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-post

Creates an issue resolution

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ResolutionId $response */
$response = $client->createResolution(new Schema\CreateResolutionDetails(
    description: 'My resolution description',
    name: 'My new resolution',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateResolutionDetails`](/docs/schema/create-resolution-details.md)

Details of an issue resolution.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the resolution. Must be unique (case-insensitive). |
| `description` | `string` | The description of the resolution. |

#### Response

Source: [`Jira\Client\Schema\ResolutionId`](/docs/schema/resolution-id.md)

The ID of an issue resolution.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue resolution. |


## Set Default Resolution
<a name="setDefaultResolution"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-default-put

Sets default issue resolution

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setDefaultResolution(new Schema\SetDefaultResolutionRequest(
    id: '3',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SetDefaultResolutionRequest`](/docs/schema/set-default-resolution-request.md)

The new default issue resolution.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the new default issue resolution. Must be an existing ID or null. Setting this to null erases the default resolution setting. |

#### Response

`true`
## Move Resolutions
<a name="moveResolutions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-move-put

Changes the order of issue resolutions

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->moveResolutions(new Schema\ReorderIssueResolutionsRequest(
    after: '10002',
    ids: [
                '10000',
                '10001',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ReorderIssueResolutionsRequest`](/docs/schema/reorder-issue-resolutions-request.md)

Change the order of issue resolutions.

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `list<string>` | The list of resolution IDs to be reordered. Cannot contain duplicates nor after ID. |
| `after` | `string` | The ID of the resolution. Required if `position` isn't provided. |
| `position` | `string` | The position for issue resolutions to be moved to. Required if `after` isn't provided. |

#### Response

`true`
## Search Resolutions
<a name="searchResolutions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-search-get

Returns a "paginated" list of resolutions.
The list can contain all resolutions or a subset determined by any combination of these criteria:

 - a list of resolutions IDs
 - whether the field configuration is a default.
This returns resolutions from company-managed (classic) projects only, as there is no concept of default resolutions in team-managed projects

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanResolutionJsonBean $response */
$response = $client->searchResolutions(
    startAt: 0,
    maxResults: 50,
    id: null,
    onlyDefault: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `id` | `?list<string>` | The list of resolutions IDs to be filtered out |
| `onlyDefault` | `?bool` | When set to true, return default only, when IDs provided, if none of them is default, return empty page. Default value is false |

#### Response

Source: [`Jira\Client\Schema\PageBeanResolutionJsonBean`](/docs/schema/page-bean-resolution-json-bean.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ResolutionJsonBean>`](/docs/schema/resolution-json-bean.md) | The list of items. |


## Get Resolution
<a name="getResolution"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-id-get

Returns an issue resolution value

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\Resolution $response */
$response = $client->getResolution(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue resolution value. |

#### Response

Source: [`Jira\Client\Schema\Resolution`](/docs/schema/resolution.md)

Details of an issue resolution.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the issue resolution. |
| `id` | `string` | The ID of the issue resolution. |
| `name` | `string` | The name of the issue resolution. |
| `self` | `string` | The URL of the issue resolution. |


## Update Resolution
<a name="updateResolution"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-id-put

Updates an issue resolution

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateResolution(
    request: new Schema\UpdateResolutionDetails(
        description: 'My updated resolution description',
        name: 'My updated resolution',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateResolutionDetails`](/docs/schema/update-resolution-details.md)

Details of an issue resolution.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the resolution. Must be unique. |
| `description` | `string` | The description of the resolution. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue resolution. |

#### Response

`true`
## Delete Resolution
<a name="deleteResolution"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-resolutions/#api-rest-api-3-resolution-id-delete

Deletes an issue resolution

This operation is "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue resolution. |
| `replaceWith` | `string` | The ID of the issue resolution that will replace the currently selected resolution. |

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
