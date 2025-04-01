# Status

Source: [`Jira\Client\Operations\Status`](/src/Operations/Status.php)

## Operations

- [Bulk Get Statuses](#getStatusesById)
- [Bulk Update Statuses](#updateStatuses)
- [Bulk Create Statuses](#createStatuses)
- [Bulk Delete Statuses](#deleteStatusesById)
- [Search Statuses Paginated](#search)
- [Get Issue Type Usages By Status And Project](#getProjectIssueTypeUsagesForStatus)
- [Get Project Usages By Status](#getProjectUsagesForStatus)
- [Get Workflow Usages By Status](#getWorkflowUsagesForStatus)

## Bulk Get Statuses
<a name="getStatusesById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-get

Returns a list of the statuses specified by one or more status IDs

**"Permissions" required:**

 - *Administer projects* "project permission."
 - *Administer Jira* "project permission."
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getStatusesById(
    id: ['foo'],
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `list<string>` | The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.<br/><br/>Min items `1`, Max items `50` |
| `expand` | `?string` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.<br/><br/>Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `usages` Returns the project and issue types that use the status in their workflow.<br/> *  `workflowUsages` Returns the workflows that use the status. |

#### Response


## Bulk Update Statuses
<a name="updateStatuses"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-put

Updates statuses by ID

**"Permissions" required:**

 - *Administer projects* "project permission."
 - *Administer Jira* "project permission."
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateStatuses(new Schema\StatusUpdateRequest(
    statuses: [
                [
                    'description' => 'The issue is resolved',
                    'id' => '1000',
                    'name' => 'Finished',
                    'statusCategory' => 'DONE',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\StatusUpdateRequest`](/docs/schema/status-update-request.md)

The list of statuses that will be updated.

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`list<StatusUpdate>`](/docs/schema/status-update.md) | The list of statuses that will be updated. |

#### Response

`true`
## Bulk Create Statuses
<a name="createStatuses"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-post

Creates statuses for a global or project scope

**"Permissions" required:**

 - *Administer projects* "project permission."
 - *Administer Jira* "project permission."
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var array $response */
$response = $client->createStatuses(new Schema\StatusCreateRequest(
    scope: [
                'project' => [
                    'id' => '1',
                ],
                'type' => 'PROJECT',
            ],
    statuses: [
                [
                    'description' => 'The issue is resolved',
                    'name' => 'Finished',
                    'statusCategory' => 'DONE',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\StatusCreateRequest`](/docs/schema/status-create-request.md)

Details of the statuses being created and their scope.

| Property | Type | Description |
| --- | --- | --- |
| `scope` | [`StatusScope`](/docs/schema/status-scope.md) |  |
| `statuses` | [`list<StatusCreate>`](/docs/schema/status-create.md) | Details of the statuses being created. |

#### Response


## Bulk Delete Statuses
<a name="deleteStatusesById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-delete

Deletes statuses by ID

**"Permissions" required:**

 - *Administer projects* "project permission."
 - *Administer Jira* "project permission."
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteStatusesById(
    id: ['foo'],
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `list<string>` | The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.<br/><br/>Min items `1`, Max items `50` |

#### Response

`true`
## Search Statuses Paginated
<a name="search"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-search-get

Returns a "paginated" list of statuses that match a search on name or project

**"Permissions" required:**

 - *Administer projects* "project permission."
 - *Administer Jira* "project permission."
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#pagination
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageOfStatuses $response */
$response = $client->search(
    expand: null,
    projectId: null,
    startAt: 0,
    maxResults: 200,
    searchString: null,
    statusCategory: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.<br/><br/>Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `usages` Returns the project and issue types that use the status in their workflow.<br/> *  `workflowUsages` Returns the workflows that use the status. |
| `projectId` | `?string` | The project the status is part of or null for global statuses. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `searchString` | `?string` | Term to match status names against or null to search for all statuses in the search scope. |
| `statusCategory` | `?string` | Category of the status to filter by. The supported values are: `TODO`, `IN_PROGRESS`, and `DONE`. |

#### Response

Source: [`Jira\Client\Schema\PageOfStatuses`](/docs/schema/page-of-statuses.md)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | The URL of the next page of results, if any. |
| `self` | `string` | The URL of this page. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | Number of items that satisfy the search. |
| `values` | [`?list<JiraStatus>`](/docs/schema/jira-status.md) | The list of items. |


## Get Issue Type Usages By Status And Project
<a name="getProjectIssueTypeUsagesForStatus"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-status-id-project-project-id-issue-type-usages-get

Returns a page of issue types in a project using a given status.

### Example

```php
/** @var Schema\StatusProjectIssueTypeUsageDTO $response */
$response = $client->getProjectIssueTypeUsagesForStatus(
    statusId: 'foo',
    projectId: 'foo',
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `statusId` | `string` | The statusId to fetch issue type usages for |
| `projectId` | `string` | The projectId to fetch issue type usages for |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\StatusProjectIssueTypeUsageDTO`](/docs/schema/status-project-issue-type-usage-dto.md)

The issue types using this status in a project.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypes` | [`StatusProjectIssueTypeUsagePage`](/docs/schema/status-project-issue-type-usage-page.md) |  |
| `projectId` | `string` | The project ID. |
| `statusId` | `string` | The status ID. |


## Get Project Usages By Status
<a name="getProjectUsagesForStatus"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-status-id-project-usages-get

Returns a page of projects using a given status.

### Example

```php
/** @var Schema\StatusProjectUsageDTO $response */
$response = $client->getProjectUsagesForStatus(
    statusId: 'foo',
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `statusId` | `string` | The statusId to fetch project usages for |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\StatusProjectUsageDTO`](/docs/schema/status-project-usage-dto.md)

The projects using this status.

| Property | Type | Description |
| --- | --- | --- |
| `projects` | [`StatusProjectUsagePage`](/docs/schema/status-project-usage-page.md) |  |
| `statusId` | `string` | The status ID. |


## Get Workflow Usages By Status
<a name="getWorkflowUsagesForStatus"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-status/#api-rest-api-3-statuses-status-id-workflow-usages-get

Returns a page of workflows using a given status.

### Example

```php
/** @var Schema\StatusWorkflowUsageDTO $response */
$response = $client->getWorkflowUsagesForStatus(
    statusId: 'foo',
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `statusId` | `string` | The statusId to fetch workflow usages for |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\StatusWorkflowUsageDTO`](/docs/schema/status-workflow-usage-dto.md)

Workflows using the status.

| Property | Type | Description |
| --- | --- | --- |
| `statusId` | `string` | The status ID. |
| `workflows` | [`StatusWorkflowUsagePage`](/docs/schema/status-workflow-usage-page.md) |  |
