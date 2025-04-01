# Issue Type Schemes

DummyDescription

Source: [`Jira\Client\Operations\IssueTypeSchemes`](/src/Operations/IssueTypeSchemes.php)

## Operations

- [Get All Issue Type Schemes](#getAllIssueTypeSchemes)
- [Create Issue Type Scheme](#createIssueTypeScheme)
- [Get Issue Type Scheme Items](#getIssueTypeSchemesMapping)
- [Get Issue Type Schemes For Projects](#getIssueTypeSchemeForProjects)
- [Assign Issue Type Scheme To Project](#assignIssueTypeSchemeToProject)
- [Update Issue Type Scheme](#updateIssueTypeScheme)
- [Delete Issue Type Scheme](#deleteIssueTypeScheme)
- [Add Issue Types To Issue Type Scheme](#addIssueTypesToIssueTypeScheme)
- [Change Order Of Issue Types](#reorderIssueTypesInIssueTypeScheme)
- [Remove Issue Type From Issue Type Scheme](#removeIssueTypeFromIssueTypeScheme)

## Get All Issue Type Schemes
<a name="getAllIssueTypeSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-get

Returns a "paginated" list of issue type schemes

Only issue type schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeScheme $response */
$response = $client->getAllIssueTypeSchemes(
    startAt: 0,
    maxResults: 50,
    id: null,
    orderBy: 'id',
    expand: '',
    queryString: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<int>` | The list of issue type schemes IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. |
| `orderBy` | `'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'id'\|`<br/>`'-id'\|`<br/>`'+id'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `name` Sorts by issue type scheme name.<br/> *  `id` Sorts by issue type scheme ID. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `projects` For each issue type schemes, returns information about the projects the issue type scheme is assigned to.<br/> *  `issueTypes` For each issue type schemes, returns information about the issueTypes the issue type scheme have. |
| `queryString` | `?string` | String used to perform a case-insensitive partial match with issue type scheme name. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeScheme`](/docs/schema/page-bean-issue-type-scheme.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeScheme>`](/docs/schema/issue-type-scheme.md) | The list of items. |


## Create Issue Type Scheme
<a name="createIssueTypeScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-post

Creates an issue type scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueTypeSchemeID $response */
$response = $client->createIssueTypeScheme(new Schema\IssueTypeSchemeDetails(
    defaultIssueTypeId: '10002',
    description: 'A collection of issue types suited to use in a kanban style project.',
    issueTypeIds: [
                '10001',
                '10002',
                '10003',
            ],
    name: 'Kanban Issue Type Scheme',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeSchemeDetails`](/docs/schema/issue-type-scheme-details.md)

Details of an issue type scheme and its associated issue types.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required. |
| `name` | `string` | The name of the issue type scheme. The name must be unique. The maximum length is 255 characters. |
| `defaultIssueTypeId` | `string` | The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`. |
| `description` | `string` | The description of the issue type scheme. The maximum length is 4000 characters. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeSchemeID`](/docs/schema/issue-type-scheme-id.md)

The ID of an issue type scheme.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `string` | The ID of the issue type scheme. |


## Get Issue Type Scheme Items
<a name="getIssueTypeSchemesMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-mapping-get

Returns a "paginated" list of issue type scheme items

Only issue type scheme items used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeSchemeMapping $response */
$response = $client->getIssueTypeSchemesMapping(
    startAt: 0,
    maxResults: 50,
    issueTypeSchemeId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `issueTypeSchemeId` | `?list<int>` | The list of issue type scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `issueTypeSchemeId=10000&issueTypeSchemeId=10001`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeSchemeMapping`](/docs/schema/page-bean-issue-type-scheme-mapping.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeSchemeMapping>`](/docs/schema/issue-type-scheme-mapping.md) | The list of items. |


## Get Issue Type Schemes For Projects
<a name="getIssueTypeSchemeForProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-project-get

Returns a "paginated" list of issue type schemes and, for each issue type scheme, a list of the projects that use it

Only issue type schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeSchemeProjects $response */
$response = $client->getIssueTypeSchemeForProjects(
    projectId: [1234],
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `list<int>` | The list of project IDs. To include multiple project IDs, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeSchemeProjects`](/docs/schema/page-bean-issue-type-scheme-projects.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeSchemeProjects>`](/docs/schema/issue-type-scheme-projects.md) | The list of items. |


## Assign Issue Type Scheme To Project
<a name="assignIssueTypeSchemeToProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-project-put

Assigns an issue type scheme to a project

If any issues in the project are assigned issue types not present in the new scheme, the operation will fail.
To complete the assignment those issues must be updated to use issue types in the new scheme

Issue type schemes can only be assigned to classic projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->assignIssueTypeSchemeToProject(new Schema\IssueTypeSchemeProjectAssociation(
    issueTypeSchemeId: '10000',
    projectId: '10000',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeSchemeProjectAssociation`](/docs/schema/issue-type-scheme-project-association.md)

Details of the association between an issue type scheme and project.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `string` | The ID of the issue type scheme. |
| `projectId` | `string` | The ID of the project. |

#### Response

`true`
## Update Issue Type Scheme
<a name="updateIssueTypeScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-issue-type-scheme-id-put

Updates an issue type scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateIssueTypeScheme(
    request: new Schema\IssueTypeSchemeUpdateDetails(
        defaultIssueTypeId: '10002',
        description: 'A collection of issue types suited to use in a kanban style project.',
        name: 'Kanban Issue Type Scheme',
    )
    issueTypeSchemeId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeSchemeUpdateDetails`](/docs/schema/issue-type-scheme-update-details.md)

Details of the name, description, and default issue type for an issue type scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultIssueTypeId` | `string` | The ID of the default issue type of the issue type scheme. |
| `description` | `string` | The description of the issue type scheme. The maximum length is 4000 characters. |
| `name` | `string` | The name of the issue type scheme. The name must be unique. The maximum length is 255 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `int` | The ID of the issue type scheme. |

#### Response

`true`
## Delete Issue Type Scheme
<a name="deleteIssueTypeScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-issue-type-scheme-id-delete

Deletes an issue type scheme

Only issue type schemes used in classic projects can be deleted

Any projects assigned to the scheme are reassigned to the default issue type scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueTypeScheme(
    issueTypeSchemeId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `int` | The ID of the issue type scheme. |

#### Response

`true`
## Add Issue Types To Issue Type Scheme
<a name="addIssueTypesToIssueTypeScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-issue-type-scheme-id-issuetype-put

Adds issue types to an issue type scheme

The added issue types are appended to the issue types list

If any of the issue types exist in the issue type scheme, the operation fails and no issue types are added

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->addIssueTypesToIssueTypeScheme(
    request: new Schema\IssueTypeIds(
        issueTypeIds: [
                '10000',
                '10002',
                '10003',
            ],
    )
    issueTypeSchemeId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeIds`](/docs/schema/issue-type-ids.md)

The list of issue type IDs.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | The list of issue type IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `int` | The ID of the issue type scheme. |

#### Response

`true`
## Change Order Of Issue Types
<a name="reorderIssueTypesInIssueTypeScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-issue-type-scheme-id-issuetype-move-put

Changes the order of issue types in an issue type scheme

The request body parameters must meet the following requirements:

 - all of the issue types must belong to the issue type scheme
 - either `after` or `position` must be provided
 - the issue type in `after` must not be in the issue type list

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->reorderIssueTypesInIssueTypeScheme(
    request: new Schema\OrderOfIssueTypes(
        after: '10008',
        issueTypeIds: [
                '10001',
                '10004',
                '10002',
            ],
    )
    issueTypeSchemeId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\OrderOfIssueTypes`](/docs/schema/order-of-issue-types.md)

An ordered list of issue type IDs and information about where to move them.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | A list of the issue type IDs to move. The order of the issue type IDs in the list is the order they are given after the move. |
| `after` | `string` | The ID of the issue type to place the moved issue types after. Required if `position` isn't provided. |
| `position` | `'First'\|'Last'\|null` | The position the issue types should be moved to. Required if `after` isn't provided. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `int` | The ID of the issue type scheme. |

#### Response

`true`
## Remove Issue Type From Issue Type Scheme
<a name="removeIssueTypeFromIssueTypeScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-schemes/#api-rest-api-3-issuetypescheme-issue-type-scheme-id-issuetype-issue-type-id-delete

Removes an issue type from an issue type scheme

This operation cannot remove:

 - any issue type used by issues
 - any issue types from the default issue type scheme
 - the last standard issue type from an issue type scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeIssueTypeFromIssueTypeScheme(
    issueTypeSchemeId: 1234,
    issueTypeId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeSchemeId` | `int` | The ID of the issue type scheme. |
| `issueTypeId` | `int` | The ID of the issue type. |

#### Response

`true`
