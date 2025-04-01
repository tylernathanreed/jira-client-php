# Issue Security Schemes

Source: [`Jira\Client\Operations\IssueSecuritySchemes`](/src/Operations/IssueSecuritySchemes.php)

## Operations

- [Get Issue Security Schemes](#getIssueSecuritySchemes)
- [Create Issue Security Scheme](#createIssueSecurityScheme)
- [Get Issue Security Levels](#getSecurityLevels)
- [Set Default Issue Security Levels](#setDefaultLevels)
- [Get Issue Security Level Members](#getSecurityLevelMembers)
- [Get Projects Using Issue Security Schemes](#searchProjectsUsingSecuritySchemes)
- [Associate Security Scheme To Project](#associateSchemesToProjects)
- [Search Issue Security Schemes](#searchSecuritySchemes)
- [Get Issue Security Scheme](#getIssueSecurityScheme)
- [Update Issue Security Scheme](#updateIssueSecurityScheme)
- [Delete Issue Security Scheme](#deleteSecurityScheme)
- [Add Issue Security Levels](#addSecurityLevel)
- [Update Issue Security Level](#updateSecurityLevel)
- [Remove Issue Security Level](#removeLevel)
- [Add Issue Security Level Members](#addSecurityLevelMembers)
- [Remove Member From Issue Security Level](#removeMemberFromSecurityLevel)

## Get Issue Security Schemes
<a name="getIssueSecuritySchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-get

Returns all "issue security schemes"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\SecuritySchemes $response */
$response = $client->getIssueSecuritySchemes();
```

### Request

#### Response

Source: [`Jira\Client\Schema\SecuritySchemes`](/docs/schema/security-schemes.md)

List of security schemes.

| Property | Type | Description |
| --- | --- | --- |
| `issueSecuritySchemes` | [`?list<SecurityScheme>`](/docs/schema/security-scheme.md) | List of security schemes. |


## Create Issue Security Scheme
<a name="createIssueSecurityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-post

Creates a security scheme with security scheme levels and levels' members.
You can create up to 100 security scheme levels and security scheme levels' members per request

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SecuritySchemeId $response */
$response = $client->createIssueSecurityScheme(new Schema\CreateIssueSecuritySchemeDetails(
    description: 'Newly created issue security scheme',
    levels: [
                [
                    'description' => 'Newly created level',
                    'isDefault' => '1',
                    'members' => [
                        [
                            'parameter' => 'administrators',
                            'type' => 'group',
                        ],
                    ],
                    'name' => 'New level',
                ],
            ],
    name: 'New security scheme',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateIssueSecuritySchemeDetails`](/docs/schema/create-issue-security-scheme-details.md)

Issue security scheme and it's details

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the issue security scheme. Must be unique (case-insensitive). |
| `description` | `string` | The description of the issue security scheme. |
| `levels` | [`?list<SecuritySchemeLevelBean>`](/docs/schema/security-scheme-level-bean.md) | The list of scheme levels which should be added to the security scheme. |

#### Response

Source: [`Jira\Client\Schema\SecuritySchemeId`](/docs/schema/security-scheme-id.md)

The ID of the issue security scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue security scheme. |


## Get Issue Security Levels
<a name="getSecurityLevels"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-level-get

Returns a "paginated" list of issue security levels

Only issue security levels in the context of classic projects are returned

Filtering using IDs is inclusive: if you specify both security scheme IDs and level IDs, the result will include both specified issue security levels and all issue security levels from the specified schemes

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanSecurityLevel $response */
$response = $client->getSecurityLevels(
    startAt: 0,
    maxResults: 50,
    id: null,
    schemeId: null,
    onlyDefault: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `id` | `?list<string>` | The list of issue security scheme level IDs. To include multiple issue security levels, separate IDs with an ampersand: `id=10000&id=10001`. |
| `schemeId` | `?list<string>` | The list of issue security scheme IDs. To include multiple issue security schemes, separate IDs with an ampersand: `schemeId=10000&schemeId=10001`. |
| `onlyDefault` | `?bool` | When set to true, returns multiple default levels for each security scheme containing a default. If you provide scheme and level IDs not associated with the default, returns an empty page. The default value is false. |

#### Response

Source: [`Jira\Client\Schema\PageBeanSecurityLevel`](/docs/schema/page-bean-security-level.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<SecurityLevel>`](/docs/schema/security-level.md) | The list of items. |


## Set Default Issue Security Levels
<a name="setDefaultLevels"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-level-default-put

Sets default issue security levels for schemes

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setDefaultLevels(new Schema\SetDefaultLevelsRequest(
    defaultValues: [
                [
                    'defaultLevelId' => '20000',
                    'issueSecuritySchemeId' => '10000',
                ],
                [
                    'defaultLevelId' => '30000',
                    'issueSecuritySchemeId' => '12000',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SetDefaultLevelsRequest`](/docs/schema/set-default-levels-request.md)

Details of new default levels.

| Property | Type | Description |
| --- | --- | --- |
| `defaultValues` | [`list<DefaultLevelValue>`](/docs/schema/default-level-value.md) | List of objects with issue security scheme ID and new default level ID. |

#### Response

`true`
## Get Issue Security Level Members
<a name="getSecurityLevelMembers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-level-member-get

Returns a "paginated" list of issue security level members

Only issue security level members in the context of classic projects are returned

Filtering using parameters is inclusive: if you specify both security scheme IDs and level IDs, the result will include all issue security level members from the specified schemes and levels

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanSecurityLevelMember $response */
$response = $client->getSecurityLevelMembers(
    startAt: 0,
    maxResults: 50,
    id: null,
    schemeId: null,
    levelId: null,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `id` | `?list<string>` | The list of issue security level member IDs. To include multiple issue security level members separate IDs with an ampersand: `id=10000&id=10001`. |
| `schemeId` | `?list<string>` | The list of issue security scheme IDs. To include multiple issue security schemes separate IDs with an ampersand: `schemeId=10000&schemeId=10001`. |
| `levelId` | `?list<string>` | The list of issue security level IDs. To include multiple issue security levels separate IDs with an ampersand: `levelId=10000&levelId=10001`. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `all` Returns all expandable information<br/> *  `field` Returns information about the custom field granted the permission<br/> *  `group` Returns information about the group that is granted the permission<br/> *  `projectRole` Returns information about the project role granted the permission<br/> *  `user` Returns information about the user who is granted the permission |

#### Response

Source: [`Jira\Client\Schema\PageBeanSecurityLevelMember`](/docs/schema/page-bean-security-level-member.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<SecurityLevelMember>`](/docs/schema/security-level-member.md) | The list of items. |


## Get Projects Using Issue Security Schemes
<a name="searchProjectsUsingSecuritySchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-project-get

Returns a "paginated" mapping of projects that are using security schemes.
You can provide either one or multiple security scheme IDs or project IDs to filter by.
If you don't provide any, this will return a list of all mappings.
Only issue security schemes in the context of classic projects are supported.
**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueSecuritySchemeToProjectMapping $response */
$response = $client->searchProjectsUsingSecuritySchemes(
    startAt: 0,
    maxResults: 50,
    issueSecuritySchemeId: null,
    projectId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `issueSecuritySchemeId` | `?list<string>` | The list of security scheme IDs to be filtered out. |
| `projectId` | `?list<string>` | The list of project IDs to be filtered out. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueSecuritySchemeToProjectMapping`](/docs/schema/page-bean-issue-security-scheme-to-project-mapping.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueSecuritySchemeToProjectMapping>`](/docs/schema/issue-security-scheme-to-project-mapping.md) | The list of items. |


## Associate Security Scheme To Project
<a name="associateSchemesToProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-project-put

Associates an issue security scheme with a project and remaps security levels of issues to the new levels, if provided

This operation is "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\AssociateSecuritySchemeWithProjectDetails`](/docs/schema/associate-security-scheme-with-project-details.md)

Issue security scheme, project, and remapping details.

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `string` | The ID of the project. |
| `schemeId` | `string` | The ID of the issue security scheme. Providing null will clear the association with the issue security scheme. |
| `oldToNewSecurityLevelMappings` | [`?list<OldToNewSecurityLevelMappingsBean>`](/docs/schema/old-to-new-security-level-mappings-bean.md) | The list of scheme levels which should be remapped to new levels of the issue security scheme. |

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


## Search Issue Security Schemes
<a name="searchSecuritySchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-search-get

Returns a "paginated" list of issue security schemes.
 
If you specify the project ID parameter, the result will contain issue security schemes and related project IDs you filter by.
Use \{@link IssueSecuritySchemeResource\#searchProjectsUsingSecuritySchemes(String, String, Set, Set)\} to obtain all projects related to scheme

Only issue security schemes in the context of classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanSecuritySchemeWithProjects $response */
$response = $client->searchSecuritySchemes(
    startAt: 0,
    maxResults: 50,
    id: null,
    projectId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `id` | `?list<string>` | The list of issue security scheme IDs. To include multiple issue security scheme IDs, separate IDs with an ampersand: `id=10000&id=10001`. |
| `projectId` | `?list<string>` | The list of project IDs. To include multiple project IDs, separate IDs with an ampersand: `projectId=10000&projectId=10001`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanSecuritySchemeWithProjects`](/docs/schema/page-bean-security-scheme-with-projects.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<SecuritySchemeWithProjects>`](/docs/schema/security-scheme-with-projects.md) | The list of items. |


## Get Issue Security Scheme
<a name="getIssueSecurityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-id-get

Returns an issue security scheme along with its security levels

**"Permissions" required:**

 - *Administer Jira* "global permission"
 - *Administer Projects* "project permission" for a project that uses the requested issue security scheme.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\SecurityScheme $response */
$response = $client->getIssueSecurityScheme(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs. |

#### Response

Source: [`Jira\Client\Schema\SecurityScheme`](/docs/schema/security-scheme.md)

Details about a security scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultSecurityLevelId` | `int` | The ID of the default security level. |
| `description` | `string` | The description of the issue security scheme. |
| `id` | `int` | The ID of the issue security scheme. |
| `levels` | [`?list<SecurityLevel>`](/docs/schema/security-level.md) |  |
| `name` | `string` | The name of the issue security scheme. |
| `self` | `string` | The URL of the issue security scheme. |


## Update Issue Security Scheme
<a name="updateIssueSecurityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-id-put

Updates the issue security scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateIssueSecurityScheme(
    request: new Schema\UpdateIssueSecuritySchemeRequestBean(
        description: 'My issue security scheme description',
        name: 'My issue security scheme name',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateIssueSecuritySchemeRequestBean`](/docs/schema/update-issue-security-scheme-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the security scheme scheme. |
| `name` | `string` | The name of the security scheme scheme. Must be unique. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue security scheme. |

#### Response

`true`
## Delete Issue Security Scheme
<a name="deleteSecurityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-scheme-id-delete

Deletes an issue security scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteSecurityScheme(
    schemeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The ID of the issue security scheme. |

#### Response

`true`
## Add Issue Security Levels
<a name="addSecurityLevel"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-scheme-id-level-put

Adds levels and levels' members to the issue security scheme.
You can add up to 100 levels per request

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->addSecurityLevel(
    request: new Schema\AddSecuritySchemeLevelsRequestBean(
        levels: [
                [
                    'description' => 'First Level Description',
                    'isDefault' => '1',
                    'members' => [
                        [
                            'type' => 'reporter',
                        ],
                        [
                            'parameter' => 'jira-administrators',
                            'type' => 'group',
                        ],
                    ],
                    'name' => 'First Level',
                ],
            ],
    )
    schemeId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AddSecuritySchemeLevelsRequestBean`](/docs/schema/add-security-scheme-levels-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `levels` | [`?list<SecuritySchemeLevelBean>`](/docs/schema/security-scheme-level-bean.md) | The list of scheme levels which should be added to the security scheme. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The ID of the issue security scheme. |

#### Response

`true`
## Update Issue Security Level
<a name="updateSecurityLevel"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-scheme-id-level-level-id-put

Updates the issue security level

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateSecurityLevel(
    request: new Schema\UpdateIssueSecurityLevelDetails(
        description: 'New level description',
        name: 'New level name',
    )
    schemeId: 'foo',
    levelId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateIssueSecurityLevelDetails`](/docs/schema/update-issue-security-level-details.md)

Details of issue security scheme level.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the issue security scheme level. |
| `name` | `string` | The name of the issue security scheme level. Must be unique. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The ID of the issue security scheme level belongs to. |
| `levelId` | `string` | The ID of the issue security level to update. |

#### Response

`true`
## Remove Issue Security Level
<a name="removeLevel"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-scheme-id-level-level-id-delete

Deletes an issue security level

This operation is "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The ID of the issue security scheme. |
| `levelId` | `string` | The ID of the issue security level to remove. |
| `replaceWith` | `?string` | The ID of the issue security level that will replace the currently selected level. |

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


## Add Issue Security Level Members
<a name="addSecurityLevelMembers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-scheme-id-level-level-id-member-put

Adds members to the issue security level.
You can add up to 100 members per request

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->addSecurityLevelMembers(
    request: new Schema\SecuritySchemeMembersRequest(
        members: [
                [
                    'type' => 'reporter',
                ],
                [
                    'parameter' => 'jira-administrators',
                    'type' => 'group',
                ],
            ],
    )
    schemeId: 'foo',
    levelId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SecuritySchemeMembersRequest`](/docs/schema/security-scheme-members-request.md)

Details of issue security scheme level new members.

| Property | Type | Description |
| --- | --- | --- |
| `members` | [`?list<SecuritySchemeLevelMemberBean>`](/docs/schema/security-scheme-level-member-bean.md) | The list of level members which should be added to the issue security scheme level. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The ID of the issue security scheme. |
| `levelId` | `string` | The ID of the issue security level. |

#### Response

`true`
## Remove Member From Issue Security Level
<a name="removeMemberFromSecurityLevel"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-schemes/#api-rest-api-3-issuesecurityschemes-scheme-id-level-level-id-member-member-id-delete

Removes an issue security level member from an issue security scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeMemberFromSecurityLevel(
    schemeId: 'foo',
    levelId: 'foo',
    memberId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `string` | The ID of the issue security scheme. |
| `levelId` | `string` | The ID of the issue security level. |
| `memberId` | `string` | The ID of the issue security level member to be removed. |

#### Response

`true`
