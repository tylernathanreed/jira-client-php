# Issue Types

Source: [`Jira\Client\Operations\IssueTypes`](/src/Operations/IssueTypes.php)

## Operations

- [Get All Issue Types For User](#getIssueAllTypes)
- [Create Issue Type](#createIssueType)
- [Get Issue Types For Project](#getIssueTypesForProject)
- [Get Issue Type](#getIssueType)
- [Update Issue Type](#updateIssueType)
- [Delete Issue Type](#deleteIssueType)
- [Get Alternative Issue Types](#getAlternativeIssueTypes)
- [Load Issue Type Avatar](#createIssueTypeAvatar)

## Get All Issue Types For User
<a name="getIssueAllTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-get

Returns all issue types

This operation can be accessed anonymously

**"Permissions" required:** Issue types are only returned as follows:

 - if the user has the *Administer Jira* "global permission", all issue types are returned
 - if the user has the *Browse projects* "project permission" for one or more projects, the issue types associated with the projects the user has permission to browse are returned.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getIssueAllTypes();
```

### Request

#### Response


## Create Issue Type
<a name="createIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-post

Creates an issue type and adds it to the default issue type scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeCreateBean`](/docs/schema/issue-type-create-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The unique name for the issue type. The maximum length is 60 characters. |
| `description` | `string` | The description of the issue type. |
| `hierarchyLevel` | `int` | The hierarchy level of the issue type. Use:<br/><br/> *  `-1` for Subtask.<br/> *  `0` for Base.<br/><br/>Defaults to `0`. |
| `type` | `'subtask'\|'standard'\|null` | Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.<br/><br/>Whether the issue type is `subtype` or `standard`. Defaults to `standard`. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeDetails`](/docs/schema/issue-type-details.md)

Details about an issue type.

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID of the issue type's avatar. |
| `description` | `string` | The description of the issue type. |
| `entityId` | `string` | Unique ID for next-gen projects. |
| `hierarchyLevel` | `int` | Hierarchy level of the issue type. |
| `iconUrl` | `string` | The URL of the issue type's avatar. |
| `id` | `string` | The ID of the issue type. |
| `name` | `string` | The name of the issue type. |
| `scope` | [`Scope`](/docs/schema/scope.md) | Details of the next-gen projects the issue type is available in. |
| `self` | `string` | The URL of these issue type details. |
| `subtask` | `bool` | Whether this issue type is used to create subtasks. |


## Get Issue Types For Project
<a name="getIssueTypesForProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-project-get

Returns issue types for a project

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" in the relevant project or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getIssueTypesForProject(
    projectId: 1234,
    level: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `int` | The ID of the project. |
| `level` | `?int` | The level of the issue type to filter by. Use:<br/><br/> *  `-1` for Subtask.<br/> *  `0` for Base.<br/> *  `1` for Epic. |

#### Response


## Get Issue Type
<a name="getIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-id-get

Returns an issue type

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" in a project the issue type is associated with or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueTypeDetails $response */
$response = $client->getIssueType(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue type. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeDetails`](/docs/schema/issue-type-details.md)

Details about an issue type.

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID of the issue type's avatar. |
| `description` | `string` | The description of the issue type. |
| `entityId` | `string` | Unique ID for next-gen projects. |
| `hierarchyLevel` | `int` | Hierarchy level of the issue type. |
| `iconUrl` | `string` | The URL of the issue type's avatar. |
| `id` | `string` | The ID of the issue type. |
| `name` | `string` | The name of the issue type. |
| `scope` | [`Scope`](/docs/schema/scope.md) | Details of the next-gen projects the issue type is available in. |
| `self` | `string` | The URL of these issue type details. |
| `subtask` | `bool` | Whether this issue type is used to create subtasks. |


## Update Issue Type
<a name="updateIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-id-put

Updates the issue type

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeUpdateBean`](/docs/schema/issue-type-update-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID of an issue type avatar. |
| `description` | `string` | The description of the issue type. |
| `name` | `string` | The unique name for the issue type. The maximum length is 60 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue type. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeDetails`](/docs/schema/issue-type-details.md)

Details about an issue type.

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID of the issue type's avatar. |
| `description` | `string` | The description of the issue type. |
| `entityId` | `string` | Unique ID for next-gen projects. |
| `hierarchyLevel` | `int` | Hierarchy level of the issue type. |
| `iconUrl` | `string` | The URL of the issue type's avatar. |
| `id` | `string` | The ID of the issue type. |
| `name` | `string` | The name of the issue type. |
| `scope` | [`Scope`](/docs/schema/scope.md) | Details of the next-gen projects the issue type is available in. |
| `self` | `string` | The URL of these issue type details. |
| `subtask` | `bool` | Whether this issue type is used to create subtasks. |


## Delete Issue Type
<a name="deleteIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-id-delete

Deletes the issue type.
If the issue type is in use, all uses are updated with the alternative issue type (`alternativeIssueTypeId`).
A list of alternative issue types are obtained from the "Get alternative issue types" resource

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueType(
    id: 'foo',
    alternativeIssueTypeId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue type. |
| `alternativeIssueTypeId` | `?string` | The ID of the replacement issue type. |

#### Response

`true`
## Get Alternative Issue Types
<a name="getAlternativeIssueTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-id-alternatives-get

Returns a list of issue types that can be used to replace the issue type.
The alternative issue types are those assigned to the same workflow scheme, field configuration scheme, and screen scheme

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var array $response */
$response = $client->getAlternativeIssueTypes(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue type. |

#### Response


## Load Issue Type Avatar
<a name="createIssueTypeAvatar"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-types/#api-rest-api-3-issuetype-id-avatar2-post

Loads an avatar for the issue type

Specify the avatar's local file location in the body of the request.
Also, include the following headers:

 - `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see "Special Headers"
 - `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG

For example:  
`curl --request POST \ --user email@example.com:<api_token> \ --header 'X-Atlassian-Token: no-check' \ --header 'Content-Type: image/< image_type>' \ --data-binary "<@/path/to/file/with/your/avatar>" \ --url 'https://your-domain.atlassian.net/rest/api/3/issuetype/{issueTypeId}'This`

The avatar is cropped to a square.
If no crop parameters are specified, the square originates at the top left of the image.
The length of the square's sides is set to the smaller of the height or width of the image

The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size

After creating the avatar, use " Update issue type" to set it as the issue type's displayed avatar

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\Avatar $response */
$response = $client->createIssueTypeAvatar(
    id: 'foo',
    size: 1234,
    x: 0,
    y: 0,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue type. |
| `size` | `int` | The length of each side of the crop region. |
| `x` | `?int` | The X coordinate of the top-left corner of the crop region. |
| `y` | `?int` | The Y coordinate of the top-left corner of the crop region. |

#### Response

Source: [`Jira\Client\Schema\Avatar`](/docs/schema/avatar.md)

Details of an avatar.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the avatar. |
| `fileName` | `string` | The file name of the avatar icon. Returned for system avatars. |
| `isDeletable` | `bool` | Whether the avatar can be deleted. |
| `isSelected` | `bool` | Whether the avatar is used in Jira. For example, shown as a project's avatar. |
| `isSystemAvatar` | `bool` | Whether the avatar is a system avatar. |
| `owner` | `string` | The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user. |
| `urls` | `array<string,string>` | The list of avatar icon URLs. |
