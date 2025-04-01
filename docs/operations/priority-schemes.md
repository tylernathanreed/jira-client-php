# Priority Schemes

DummyDescription

Source: [`Jira\Client\Operations\PrioritySchemes`](/src/Operations/PrioritySchemes.php)

## Operations

- [Get Priority Schemes](#getPrioritySchemes)
- [Create Priority Scheme](#createPriorityScheme)
- [Suggested Priorities For Mappings](#suggestedPrioritiesForMappings)
- [Get Available Priorities By Priority Scheme](#getAvailablePrioritiesByPriorityScheme)
- [Update Priority Scheme](#updatePriorityScheme)
- [Delete Priority Scheme](#deletePriorityScheme)
- [Get Priorities By Priority Scheme](#getPrioritiesByPriorityScheme)
- [Get Projects By Priority Scheme](#getProjectsByPriorityScheme)

## Get Priority Schemes
<a name="getPrioritySchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-get

Returns a "paginated" list of priority schemes

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects $response */
$response = $client->getPrioritySchemes(
    startAt: 0,
    maxResults: 50,
    priorityId: null,
    schemeId: null,
    schemeName: '',
    onlyDefault: false,
    orderBy: '+name',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `priorityId` | `?list<int>` | A set of priority IDs to filter by. To include multiple IDs, provide an ampersand-separated list. For example, `priorityId=10000&priorityId=10001`. |
| `schemeId` | `?list<int>` | A set of priority scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `schemeId=10000&schemeId=10001`. |
| `schemeName` | `?string` | The name of scheme to search for. |
| `onlyDefault` | `?bool` | Whether only the default priority is returned. |
| `orderBy` | `'name'\|'+name'\|'-name'\|null` | The ordering to return the priority schemes by. |
| `expand` | `?string` | A comma separated list of additional information to return. "priorities" will return priorities associated with the priority scheme. "projects" will return projects associated with the priority scheme. `expand=priorities,projects`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects`](/docs/schema/page-bean-priority-scheme-with-paginated-priorities-and-projects.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<PrioritySchemeWithPaginatedPrioritiesAndProjects>`](/docs/schema/priority-scheme-with-paginated-priorities-and-projects.md) | The list of items. |


## Create Priority Scheme
<a name="createPriorityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-post

Creates a new priority scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PrioritySchemeId $response */
$response = $client->createPriorityScheme(new Schema\CreatePrioritySchemeDetails(
    defaultPriorityId: '10001',
    description: 'My priority scheme description',
    mappings: [
                'in' => [
                    10002 => '10000',
                    10005 => '10001',
                    10006 => '10001',
                    10008 => '10003',
                ],
                'out' => [
                ],
            ],
    name: 'My new priority scheme',
    priorityIds: [
                '10000',
                '10001',
                '10003',
            ],
    projectIds: [
                '10005',
                '10006',
                '10007',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreatePrioritySchemeDetails`](/docs/schema/create-priority-scheme-details.md)

Details of a new priority scheme

| Property | Type | Description |
| --- | --- | --- |
| `defaultPriorityId` | `int` | The ID of the default priority for the priority scheme. |
| `name` | `string` | The name of the priority scheme. Must be unique. |
| `priorityIds` | `list<int>` | The IDs of priorities in the scheme. |
| `description` | `string` | The description of the priority scheme. |
| `mappings` | [`PriorityMapping`](/docs/schema/priority-mapping.md) | Instructions to migrate the priorities of issues.<br/><br/>`in` mappings are used to migrate the priorities of issues to priorities used within the priority scheme.<br/><br/>`out` mappings are used to migrate the priorities of issues to priorities not used within the priority scheme.<br/><br/> *  When **priorities** are **added** to the new priority scheme, no mapping needs to be provided as the new priorities are not used by any issues.<br/> *  When **priorities** are **removed** from the new priority scheme, no mapping needs to be provided as the removed priorities are not used by any issues.<br/> *  When **projects** are **added** to the priority scheme, the priorities of issues in those projects might need to be migrated to new priorities used by the priority scheme. This can occur when the current scheme does not use all the priorities in the project(s)' priority scheme(s).<br/>    <br/>     *  An `in` mapping must be provided for each of these priorities.<br/> *  When **projects** are **removed** from the priority scheme, no mapping needs to be provided as the removed projects are not using the priorities of the new priority scheme.<br/><br/>For more information on `in` and `out` mappings, see the child properties documentation for the `PriorityMapping` object below. |
| `projectIds` | `?list<int>` | The IDs of projects that will use the priority scheme. |

#### Response

Source: [`Jira\Client\Schema\PrioritySchemeId`](/docs/schema/priority-scheme-id.md)

The ID of a priority scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the priority scheme. |
| `task` | [`TaskProgressBeanJsonNode`](/docs/schema/task-progress-bean-json-node.md) | The in-progress issue migration task. |


## Suggested Priorities For Mappings
<a name="suggestedPrioritiesForMappings"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-mappings-post

Returns a "paginated" list of priorities that would require mapping, given a change in priorities or projects associated with a priority scheme

**"Permissions" required:** Permission to access Jira.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PageBeanPriorityWithSequence $response */
$response = $client->suggestedPrioritiesForMappings(new Schema\SuggestedMappingsRequestBean(
    maxResults: '50',
    priorities: [
                'add' => [
                    0 => '10001',
                    1 => '10002',
                ],
                'remove' => [
                    0 => '10003',
                ],
            ],
    projects: [
                'add' => [
                    0 => '10021',
                ],
            ],
    schemeId: '10005',
    startAt: '0',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SuggestedMappingsRequestBean`](/docs/schema/suggested-mappings-request-bean.md)

Details of changes to a priority scheme that require suggested priority mappings.

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `priorities` | [`SuggestedMappingsForPrioritiesRequestBean`](/docs/schema/suggested-mappings-for-priorities-request-bean.md) | The priority changes in the scheme. |
| `projects` | [`SuggestedMappingsForProjectsRequestBean`](/docs/schema/suggested-mappings-for-projects-request-bean.md) | The project changes in the scheme. |
| `schemeId` | `int` | The id of the priority scheme. |
| `startAt` | `int` | The index of the first item returned on the page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanPriorityWithSequence`](/docs/schema/page-bean-priority-with-sequence.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<PriorityWithSequence>`](/docs/schema/priority-with-sequence.md) | The list of items. |


## Get Available Priorities By Priority Scheme
<a name="getAvailablePrioritiesByPriorityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-priorities-available-get

Returns a "paginated" list of priorities available for adding to a priority scheme

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanPriorityWithSequence $response */
$response = $client->getAvailablePrioritiesByPriorityScheme(
    schemeId: 'foo',
    startAt: 0,
    maxResults: 50,
    query: '',
    exclude: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The priority scheme ID. |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `query` | `?string` | The string to query priorities on by name. |
| `exclude` | `?list<string>` | A list of priority IDs to exclude from the results. |

#### Response

Source: [`Jira\Client\Schema\PageBeanPriorityWithSequence`](/docs/schema/page-bean-priority-with-sequence.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<PriorityWithSequence>`](/docs/schema/priority-with-sequence.md) | The list of items. |


## Update Priority Scheme
<a name="updatePriorityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-scheme-id-put

Updates a priority scheme.
This includes its details, the lists of priorities and projects in it

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\UpdatePrioritySchemeResponseBean $response */
$response = $client->updatePriorityScheme(
    request: new Schema\UpdatePrioritySchemeRequestBean(
        defaultPriorityId: '10001',
        description: 'My priority scheme description',
        mappings: [
                'in' => [
                    10003 => '10002',
                    10004 => '10001',
                ],
                'out' => [
                    10001 => '10005',
                    10002 => '10006',
                ],
            ],
        name: 'My new priority scheme',
        priorities: [
                'add' => [
                    'ids' => [
                        0 => '10001',
                        1 => '10002',
                    ],
                ],
                'remove' => [
                    'ids' => [
                        0 => '10003',
                        1 => '10004',
                    ],
                ],
            ],
        projects: [
                'add' => [
                    'ids' => [
                        0 => '10101',
                        1 => '10102',
                    ],
                ],
                'remove' => [
                    'ids' => [
                        0 => '10103',
                        1 => '10104',
                    ],
                ],
            ],
    )
    schemeId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdatePrioritySchemeRequestBean`](/docs/schema/update-priority-scheme-request-bean.md)

Details of a priority scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultPriorityId` | `int` | The default priority of the scheme. |
| `description` | `string` | The description of the priority scheme. |
| `mappings` | [`PriorityMapping`](/docs/schema/priority-mapping.md) | Instructions to migrate the priorities of issues.<br/><br/>`in` mappings are used to migrate the priorities of issues to priorities used within the priority scheme.<br/><br/>`out` mappings are used to migrate the priorities of issues to priorities not used within the priority scheme.<br/><br/> *  When **priorities** are **added** to the priority scheme, no mapping needs to be provided as the new priorities are not used by any issues.<br/> *  When **priorities** are **removed** from the priority scheme, issues that are using those priorities must be migrated to new priorities used by the priority scheme.<br/>    <br/>     *  An `in` mapping must be provided for each of these priorities.<br/> *  When **projects** are **added** to the priority scheme, the priorities of issues in those projects might need to be migrated to new priorities used by the priority scheme. This can occur when the current scheme does not use all the priorities in the project(s)' priority scheme(s).<br/>    <br/>     *  An `in` mapping must be provided for each of these priorities.<br/> *  When **projects** are **removed** from the priority scheme, the priorities of issues in those projects might need to be migrated to new priorities within the **Default Priority Scheme** that are not used by the priority scheme. This can occur when the **Default Priority Scheme** does not use all the priorities within the current scheme.<br/>    <br/>     *  An `out` mapping must be provided for each of these priorities.<br/><br/>For more information on `in` and `out` mappings, see the child properties documentation for the `PriorityMapping` object below. |
| `name` | `string` | The name of the priority scheme. Must be unique. |
| `priorities` | [`UpdatePrioritiesInSchemeRequestBean`](/docs/schema/update-priorities-in-scheme-request-bean.md) | The priorities in the scheme. |
| `projects` | [`UpdateProjectsInSchemeRequestBean`](/docs/schema/update-projects-in-scheme-request-bean.md) | The projects in the scheme. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the priority scheme. |

#### Response

Source: [`Jira\Client\Schema\UpdatePrioritySchemeResponseBean`](/docs/schema/update-priority-scheme-response-bean.md)

Details of the updated priority scheme.

| Property | Type | Description |
| --- | --- | --- |
| `priorityScheme` | [`PrioritySchemeWithPaginatedPrioritiesAndProjects`](/docs/schema/priority-scheme-with-paginated-priorities-and-projects.md) |  |
| `task` | [`TaskProgressBeanJsonNode`](/docs/schema/task-progress-bean-json-node.md) | The in-progress issue migration task. |


## Delete Priority Scheme
<a name="deletePriorityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-scheme-id-delete

Deletes a priority scheme

This operation is only available for priority schemes without any associated projects.
Any associated projects must be removed from the priority scheme before this operation can be performed

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deletePriorityScheme(
    schemeId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The priority scheme ID. |

#### Response

`true`
## Get Priorities By Priority Scheme
<a name="getPrioritiesByPriorityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-scheme-id-priorities-get

Returns a "paginated" list of priorities by scheme

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanPriorityWithSequence $response */
$response = $client->getPrioritiesByPriorityScheme(
    schemeId: 'foo',
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The priority scheme ID. |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanPriorityWithSequence`](/docs/schema/page-bean-priority-with-sequence.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<PriorityWithSequence>`](/docs/schema/priority-with-sequence.md) | The list of items. |


## Get Projects By Priority Scheme
<a name="getProjectsByPriorityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-priority-schemes/#api-rest-api-3-priorityscheme-scheme-id-projects-get

Returns a "paginated" list of projects by scheme

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanProject $response */
$response = $client->getProjectsByPriorityScheme(
    schemeId: 'foo',
    startAt: 0,
    maxResults: 50,
    projectId: null,
    query: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The priority scheme ID. |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `projectId` | `?list<int>` | The project IDs to filter by. For example, `projectId=10000&projectId=10001`. |
| `query` | `?string` | The string to query projects on by name. |

#### Response

Source: [`Jira\Client\Schema\PageBeanProject`](/docs/schema/page-bean-project.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Project>`](/docs/schema/project.md) | The list of items. |
