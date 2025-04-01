# Issue Type Screen Schemes

DummyDescription

Source: [`Jira\Client\Operations\IssueTypeScreenSchemes`](/src/Operations/IssueTypeScreenSchemes.php)

## Operations

- [Get Issue Type Screen Schemes](#getIssueTypeScreenSchemes)
- [Create Issue Type Screen Scheme](#createIssueTypeScreenScheme)
- [Get Issue Type Screen Scheme Items](#getIssueTypeScreenSchemeMappings)
- [Get Issue Type Screen Schemes For Projects](#getIssueTypeScreenSchemeProjectAssociations)
- [Assign Issue Type Screen Scheme To Project](#assignIssueTypeScreenSchemeToProject)
- [Update Issue Type Screen Scheme](#updateIssueTypeScreenScheme)
- [Delete Issue Type Screen Scheme](#deleteIssueTypeScreenScheme)
- [Append Mappings To Issue Type Screen Scheme](#appendMappingsForIssueTypeScreenScheme)
- [Update Issue Type Screen Scheme Default Screen Scheme](#updateDefaultScreenScheme)
- [Remove Mappings From Issue Type Screen Scheme](#removeMappingsFromIssueTypeScreenScheme)
- [Get Issue Type Screen Scheme Projects](#getProjectsForIssueTypeScreenScheme)

## Get Issue Type Screen Schemes
<a name="getIssueTypeScreenSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-get

Returns a "paginated" list of issue type screen schemes

Only issue type screen schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeScreenScheme $response */
$response = $client->getIssueTypeScreenSchemes(
    startAt: 0,
    maxResults: 50,
    id: null,
    queryString: '',
    orderBy: 'id',
    expand: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<int>` | The list of issue type screen scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. |
| `queryString` | `?string` | String used to perform a case-insensitive partial match with issue type screen scheme name. |
| `orderBy` | `'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'id'\|`<br/>`'-id'\|`<br/>`'+id'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `name` Sorts by issue type screen scheme name.<br/> *  `id` Sorts by issue type screen scheme ID. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts `projects` that, for each issue type screen schemes, returns information about the projects the issue type screen scheme is assigned to. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeScreenScheme`](/docs/schema/page-bean-issue-type-screen-scheme.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeScreenScheme>`](/docs/schema/issue-type-screen-scheme.md) | The list of items. |


## Create Issue Type Screen Scheme
<a name="createIssueTypeScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-post

Creates an issue type screen scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueTypeScreenSchemeId $response */
$response = $client->createIssueTypeScreenScheme(new Schema\IssueTypeScreenSchemeDetails(
    issueTypeMappings: [
                [
                    'issueTypeId' => 'default',
                    'screenSchemeId' => '10001',
                ],
                [
                    'issueTypeId' => '10001',
                    'screenSchemeId' => '10002',
                ],
                [
                    'issueTypeId' => '10002',
                    'screenSchemeId' => '10002',
                ],
            ],
    name: 'Scrum issue type screen scheme',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeDetails`](/docs/schema/issue-type-screen-scheme-details.md)

The details of an issue type screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeMappings` | [`list<IssueTypeScreenSchemeMapping>`](/docs/schema/issue-type-screen-scheme-mapping.md) | The IDs of the screen schemes for the issue type IDs and *default*. A *default* entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme. |
| `name` | `string` | The name of the issue type screen scheme. The name must be unique. The maximum length is 255 characters. |
| `description` | `string` | The description of the issue type screen scheme. The maximum length is 255 characters. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeId`](/docs/schema/issue-type-screen-scheme-id.md)

The ID of an issue type screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue type screen scheme. |


## Get Issue Type Screen Scheme Items
<a name="getIssueTypeScreenSchemeMappings"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-mapping-get

Returns a "paginated" list of issue type screen scheme items

Only issue type screen schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeScreenSchemeItem $response */
$response = $client->getIssueTypeScreenSchemeMappings(
    startAt: 0,
    maxResults: 50,
    issueTypeScreenSchemeId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `issueTypeScreenSchemeId` | `?list<int>` | The list of issue type screen scheme IDs. To include multiple issue type screen schemes, separate IDs with ampersand: `issueTypeScreenSchemeId=10000&issueTypeScreenSchemeId=10001`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeScreenSchemeItem`](/docs/schema/page-bean-issue-type-screen-scheme-item.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeScreenSchemeItem>`](/docs/schema/issue-type-screen-scheme-item.md) | The list of items. |


## Get Issue Type Screen Schemes For Projects
<a name="getIssueTypeScreenSchemeProjectAssociations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-project-get

Returns a "paginated" list of issue type screen schemes and, for each issue type screen scheme, a list of the projects that use it

Only issue type screen schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeScreenSchemesProjects $response */
$response = $client->getIssueTypeScreenSchemeProjectAssociations(
    projectId: [1234],
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `list<int>` | The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeScreenSchemesProjects`](/docs/schema/page-bean-issue-type-screen-schemes-projects.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeScreenSchemesProjects>`](/docs/schema/issue-type-screen-schemes-projects.md) | The list of items. |


## Assign Issue Type Screen Scheme To Project
<a name="assignIssueTypeScreenSchemeToProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-project-put

Assigns an issue type screen scheme to a project

Issue type screen schemes can only be assigned to classic projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->assignIssueTypeScreenSchemeToProject(new Schema\IssueTypeScreenSchemeProjectAssociation(
    issueTypeScreenSchemeId: '10001',
    projectId: '10002',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeProjectAssociation`](/docs/schema/issue-type-screen-scheme-project-association.md)

Associated issue type screen scheme and project.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |
| `projectId` | `string` | The ID of the project. |

#### Response

`true`
## Update Issue Type Screen Scheme
<a name="updateIssueTypeScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-issue-type-screen-scheme-id-put

Updates an issue type screen scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateIssueTypeScreenScheme(
    request: new Schema\IssueTypeScreenSchemeUpdateDetails(
        description: 'Screens for scrum issue types.',
        name: 'Scrum scheme',
    )
    issueTypeScreenSchemeId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeUpdateDetails`](/docs/schema/issue-type-screen-scheme-update-details.md)

Details of an issue type screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the issue type screen scheme. The maximum length is 255 characters. |
| `name` | `string` | The name of the issue type screen scheme. The name must be unique. The maximum length is 255 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |

#### Response

`true`
## Delete Issue Type Screen Scheme
<a name="deleteIssueTypeScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-issue-type-screen-scheme-id-delete

Deletes an issue type screen scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueTypeScreenScheme(
    issueTypeScreenSchemeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |

#### Response

`true`
## Append Mappings To Issue Type Screen Scheme
<a name="appendMappingsForIssueTypeScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-issue-type-screen-scheme-id-mapping-put

Appends issue type to screen scheme mappings to an issue type screen scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->appendMappingsForIssueTypeScreenScheme(
    request: new Schema\IssueTypeScreenSchemeMappingDetails(
        issueTypeMappings: [
                [
                    'issueTypeId' => '10000',
                    'screenSchemeId' => '10001',
                ],
                [
                    'issueTypeId' => '10001',
                    'screenSchemeId' => '10002',
                ],
                [
                    'issueTypeId' => '10002',
                    'screenSchemeId' => '10002',
                ],
            ],
    )
    issueTypeScreenSchemeId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeMappingDetails`](/docs/schema/issue-type-screen-scheme-mapping-details.md)

A list of issue type screen scheme mappings.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeMappings` | [`list<IssueTypeScreenSchemeMapping>`](/docs/schema/issue-type-screen-scheme-mapping.md) | The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |

#### Response

`true`
## Update Issue Type Screen Scheme Default Screen Scheme
<a name="updateDefaultScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-issue-type-screen-scheme-id-mapping-default-put

Updates the default screen scheme of an issue type screen scheme.
The default screen scheme is used for all unmapped issue types

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateDefaultScreenScheme(
    request: new Schema\UpdateDefaultScreenScheme(
        screenSchemeId: '10010',
    )
    issueTypeScreenSchemeId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateDefaultScreenScheme`](/docs/schema/update-default-screen-scheme.md)

The ID of a screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `screenSchemeId` | `string` | The ID of the screen scheme. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |

#### Response

`true`
## Remove Mappings From Issue Type Screen Scheme
<a name="removeMappingsFromIssueTypeScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-issue-type-screen-scheme-id-mapping-remove-post

Removes issue type to screen scheme mappings from an issue type screen scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->removeMappingsFromIssueTypeScreenScheme(
    request: new Schema\IssueTypeIds(
        issueTypeIds: [
                '10000',
                '10001',
                '10004',
            ],
    )
    issueTypeScreenSchemeId: 'foo',
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
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |

#### Response

`true`
## Get Issue Type Screen Scheme Projects
<a name="getProjectsForIssueTypeScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/#api-rest-api-3-issuetypescreenscheme-issue-type-screen-scheme-id-project-get

Returns a "paginated" list of projects associated with an issue type screen scheme

Only company-managed projects associated with an issue type screen scheme are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanProjectDetails $response */
$response = $client->getProjectsForIssueTypeScreenScheme(
    issueTypeScreenSchemeId: 1234,
    startAt: 0,
    maxResults: 50,
    query: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeScreenSchemeId` | `int` | The ID of the issue type screen scheme. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `query` | `?string` |  |

#### Response

Source: [`Jira\Client\Schema\PageBeanProjectDetails`](/docs/schema/page-bean-project-details.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ProjectDetails>`](/docs/schema/project-details.md) | The list of items. |
