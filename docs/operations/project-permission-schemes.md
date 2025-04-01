# Project Permission Schemes

Source: [`Jira\Client\Operations\ProjectPermissionSchemes`](/src/Operations/ProjectPermissionSchemes.php)

## Operations

- [Get Project Issue Security Scheme](#getProjectIssueSecurityScheme)
- [Get Assigned Permission Scheme](#getAssignedPermissionScheme)
- [Assign Permission Scheme](#assignPermissionScheme)
- [Get Project Issue Security Levels](#getSecurityLevelsForProject)

## Get Project Issue Security Scheme
<a name="getProjectIssueSecurityScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-permission-schemes/#api-rest-api-3-project-project-key-or-id-issuesecuritylevelscheme-get

Returns the "issue security scheme" associated with the project

**"Permissions" required:** *Administer Jira* "global permission" or the *Administer Projects* "project permission".
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\SecurityScheme $response */
$response = $client->getProjectIssueSecurityScheme(
    projectKeyOrId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKeyOrId` | `string` | The project ID or project key (case sensitive). |

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


## Get Assigned Permission Scheme
<a name="getAssignedPermissionScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-permission-schemes/#api-rest-api-3-project-project-key-or-id-permissionscheme-get

Gets the "permission scheme" associated with the project

**"Permissions" required:** *Administer Jira* "global permission" or *Administer projects* "project permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PermissionScheme $response */
$response = $client->getAssignedPermissionScheme(
    projectKeyOrId: 'foo',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKeyOrId` | `string` | The project ID or project key (case sensitive). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

#### Response

Source: [`Jira\Client\Schema\PermissionScheme`](/docs/schema/permission-scheme.md)

Details of a permission scheme.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the permission scheme. Must be unique. |
| `description` | `string` | A description for the permission scheme. |
| `expand` | `string` | The expand options available for the permission scheme. |
| `id` | `int` | The ID of the permission scheme. |
| `permissions` | [`?list<PermissionGrant>`](/docs/schema/permission-grant.md) | The permission scheme to create or update. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more information. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the permission scheme. |
| `self` | `string` | The URL of the permission scheme. |


## Assign Permission Scheme
<a name="assignPermissionScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-permission-schemes/#api-rest-api-3-project-project-key-or-id-permissionscheme-put

Assigns a permission scheme with a project.
See "Managing project permissions" for more information about permission schemes

**"Permissions" required:** *Administer Jira* "global permission"
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PermissionScheme $response */
$response = $client->assignPermissionScheme(
    request: new Schema\IdBean(
        id: '10000',
    )
    projectKeyOrId: 'foo',
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IdBean`](/docs/schema/id-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the permission scheme to associate with the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to get a list of permission scheme IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKeyOrId` | `string` | The project ID or project key (case sensitive). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

#### Response

Source: [`Jira\Client\Schema\PermissionScheme`](/docs/schema/permission-scheme.md)

Details of a permission scheme.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the permission scheme. Must be unique. |
| `description` | `string` | A description for the permission scheme. |
| `expand` | `string` | The expand options available for the permission scheme. |
| `id` | `int` | The ID of the permission scheme. |
| `permissions` | [`?list<PermissionGrant>`](/docs/schema/permission-grant.md) | The permission scheme to create or update. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more information. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the permission scheme. |
| `self` | `string` | The URL of the permission scheme. |


## Get Project Issue Security Levels
<a name="getSecurityLevelsForProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-permission-schemes/#api-rest-api-3-project-project-key-or-id-securitylevel-get

Returns all "issue security" levels for the project that the user has access to

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "global permission" for the project, however, issue security levels are only returned for authenticated user with *Set Issue Security* "global permission" for the project.
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ProjectIssueSecurityLevels $response */
$response = $client->getSecurityLevelsForProject(
    projectKeyOrId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKeyOrId` | `string` | The project ID or project key (case sensitive). |

#### Response

Source: [`Jira\Client\Schema\ProjectIssueSecurityLevels`](/docs/schema/project-issue-security-levels.md)

List of issue level security items in a project.

| Property | Type | Description |
| --- | --- | --- |
| `levels` | [`list<SecurityLevel>`](/docs/schema/security-level.md) | Issue level security items list. |
