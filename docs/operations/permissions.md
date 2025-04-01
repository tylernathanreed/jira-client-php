# Permissions

Source: [`Jira\Client\Operations\Permissions`](/src/Operations/Permissions.php)

## Operations

- [Get My Permissions](#getMyPermissions)
- [Get All Permissions](#getAllPermissions)
- [Get Bulk Permissions](#getBulkPermissions)
- [Get Permitted Projects](#getPermittedProjects)

## Get My Permissions
<a name="getMyPermissions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permissions/#api-rest-api-3-mypermissions-get

Returns a list of permissions indicating which permissions the user has.
Details of the user's permissions can be obtained in a global, project, issue or comment context

The user is reported as having a project permission:

 - in the global context, if the user has the project permission in any project
 - for a project, where the project permission is determined using issue data, if the user meets the permission's criteria for any issue in the project.
Otherwise, if the user has the project permission in the project
 - for an issue, where a project permission is determined using issue data, if the user has the permission in the issue.
Otherwise, if the user has the project permission in the project containing the issue
 - for a comment, where the user has both the permission to browse the comment and the project permission for the comment's parent issue.
Only the BROWSE\_PROJECTS permission is supported.
If a `commentId` is provided whose `permissions` does not equal BROWSE\_PROJECTS, a 400 error will be returned

This means that users may be shown as having an issue permission (such as EDIT\_ISSUES) in the global context or a project context but may not have the permission for any or all issues.
For example, if Reporters have the EDIT\_ISSUES permission a user would be shown as having this permission in the global context or the context of a project, because any user can be a reporter.
However, if they are not the user who reported the issue queried they would not have EDIT\_ISSUES permission for that issue

For "Jira Service Management project permissions", this will be evaluated similarly to a user in the customer portal.
For example, if the BROWSE\_PROJECTS permission is granted to Service Project Customer - Portal Access, any users with access to the customer portal will have the BROWSE\_PROJECTS permission

Global permissions are unaffected by context

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://support.atlassian.com/jira-cloud-administration/docs/customize-jira-service-management-permissions/

### Example

```php
/** @var Schema\Permissions $response */
$response = $client->getMyPermissions(
    projectKey: null,
    projectId: null,
    issueKey: null,
    issueId: null,
    permissions: 'BROWSE_PROJECTS,EDIT_ISSUES',
    projectUuid: null,
    projectConfigurationUuid: null,
    commentId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKey` | `?string` | The key of project. Ignored if `projectId` is provided. |
| `projectId` | `?string` | The ID of project. |
| `issueKey` | `?string` | The key of the issue. Ignored if `issueId` is provided. |
| `issueId` | `?string` | The ID of the issue. |
| `permissions` | `?string` | A list of permission keys. (Required) This parameter accepts a comma-separated list. To get the list of available permissions, use [Get all permissions](#api-rest-api-3-permissions-get). |
| `projectUuid` | `?string` |  |
| `projectConfigurationUuid` | `?string` |  |
| `commentId` | `?string` | The ID of the comment. |

#### Response

Source: [`Jira\Client\Schema\Permissions`](/docs/schema/permissions.md)

Details about permissions.

| Property | Type | Description |
| --- | --- | --- |
| `permissions` | [`array<string,UserPermission>`](/docs/schema/user-permission.md) | List of permissions. |


## Get All Permissions
<a name="getAllPermissions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permissions/#api-rest-api-3-permissions-get

Returns all permissions, including:

 - global permissions
 - project permissions
 - global permissions added by plugins

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\Permissions $response */
$response = $client->getAllPermissions();
```

### Request

#### Response

Source: [`Jira\Client\Schema\Permissions`](/docs/schema/permissions.md)

Details about permissions.

| Property | Type | Description |
| --- | --- | --- |
| `permissions` | [`array<string,UserPermission>`](/docs/schema/user-permission.md) | List of permissions. |


## Get Bulk Permissions
<a name="getBulkPermissions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permissions/#api-rest-api-3-permissions-check-post

Returns:

 - for a list of global permissions, the global permissions granted to a user
 - for a list of project permissions and lists of projects and issues, for each project permission a list of the projects and issues a user can access or manipulate

If no account ID is provided, the operation returns details for the logged in user

Note that:

 - Invalid project and issue IDs are ignored
 - A maximum of 1000 projects and 1000 issues can be checked
 - Null values in `globalPermissions`, `projectPermissions`, `projectPermissions.projects`, and `projectPermissions.issues` are ignored
 - Empty strings in `projectPermissions.permissions` are ignored

**Deprecation notice:** The required OAuth 2.0 scopes will be updated on June 15, 2024

 - **Classic**: `read:jira-work`
 - **Granular**: `read:permission:jira`

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" to check the permissions for other users, otherwise none.
However, Connect apps can make a call from the app server to the product to obtain permission details for any user, without admin permission.
This Connect app ability doesn't apply to calls made using AP.request() in a browser.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\BulkPermissionGrants $response */
$response = $client->getBulkPermissions(new Schema\BulkPermissionsRequestBean(
    accountId: '5b10a2844c20165700ede21g',
    globalPermissions: [
                'ADMINISTER',
            ],
    projectPermissions: [
                [
                    'issues' => [
                        '10010',
                        '10011',
                        '10012',
                        '10013',
                        '10014',
                    ],
                    'permissions' => [
                        'EDIT_ISSUES',
                    ],
                    'projects' => [
                        '10001',
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkPermissionsRequestBean`](/docs/schema/bulk-permissions-request-bean.md)

Details of global permissions to look up and project permissions with associated projects and issues to look up.

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of a user. |
| `globalPermissions` | `?list<string>` | Global permissions to look up. |
| `projectPermissions` | [`?list<BulkProjectPermissions>`](/docs/schema/bulk-project-permissions.md) | Project permissions with associated projects and issues to look up. |

#### Response

Source: [`Jira\Client\Schema\BulkPermissionGrants`](/docs/schema/bulk-permission-grants.md)

Details of global and project permissions granted to the user.

| Property | Type | Description |
| --- | --- | --- |
| `globalPermissions` | `list<string>` | List of permissions granted to the user. |
| `projectPermissions` | [`list<BulkProjectPermissionGrants>`](/docs/schema/bulk-project-permission-grants.md) | List of project permissions and the projects and issues those permissions provide access to. |


## Get Permitted Projects
<a name="getPermittedProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permissions/#api-rest-api-3-permissions-project-post

Returns all the projects where the user is granted a list of project permissions

This operation can be accessed anonymously

**"Permissions" required:** None.


### Request

#### Request Body

Source: [`Jira\Client\Schema\PermissionsKeysBean`](/docs/schema/permissions-keys-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `permissions` | `list<string>` | A list of permission keys. |

#### Response

Source: [`Jira\Client\Schema\PermittedProjects`](/docs/schema/permitted-projects.md)

A list of projects in which a user is granted permissions.

| Property | Type | Description |
| --- | --- | --- |
| `projects` | [`?list<ProjectIdentifierBean>`](/docs/schema/project-identifier-bean.md) | A list of projects. |
