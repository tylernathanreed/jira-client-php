# Filter Sharing

DummyDescription

Source: [`Jira\Client\Operations\FilterSharing`](/src/Operations/FilterSharing.php)

## Operations

- [Get Default Share Scope](#getDefaultShareScope)
- [Set Default Share Scope](#setDefaultShareScope)
- [Get Share Permissions](#getSharePermissions)
- [Add Share Permission](#addSharePermission)
- [Get Share Permission](#getSharePermission)
- [Delete Share Permission](#deleteSharePermission)

## Get Default Share Scope
<a name="getDefaultShareScope"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filter-sharing/#api-rest-api-3-filter-default-share-scope-get

Returns the default sharing settings for new filters and dashboards for a user

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\DefaultShareScope $response */
$response = $client->getDefaultShareScope();
```

### Request

#### Response

Source: [`Jira\Client\Schema\DefaultShareScope`](/docs/schema/default-share-scope.md)

Details of the scope of the default sharing for new filters and dashboards.

| Property | Type | Description |
| --- | --- | --- |
| `scope` | `'GLOBAL'\|'AUTHENTICATED'\|'PRIVATE'` | The scope of the default sharing for new filters and dashboards:<br/><br/> *  `AUTHENTICATED` Shared with all logged-in users.<br/> *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.<br/> *  `PRIVATE` Not shared with any users. |


## Set Default Share Scope
<a name="setDefaultShareScope"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filter-sharing/#api-rest-api-3-filter-default-share-scope-put

Sets the default sharing for new filters and dashboards for a user

**"Permissions" required:** Permission to access Jira.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\DefaultShareScope $response */
$response = $client->setDefaultShareScope(new Schema\DefaultShareScope(
    scope: 'GLOBAL',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DefaultShareScope`](/docs/schema/default-share-scope.md)

Details of the scope of the default sharing for new filters and dashboards.

| Property | Type | Description |
| --- | --- | --- |
| `scope` | `'GLOBAL'\|'AUTHENTICATED'\|'PRIVATE'` | The scope of the default sharing for new filters and dashboards:<br/><br/> *  `AUTHENTICATED` Shared with all logged-in users.<br/> *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.<br/> *  `PRIVATE` Not shared with any users. |

#### Response

Source: [`Jira\Client\Schema\DefaultShareScope`](/docs/schema/default-share-scope.md)

Details of the scope of the default sharing for new filters and dashboards.

| Property | Type | Description |
| --- | --- | --- |
| `scope` | `'GLOBAL'\|'AUTHENTICATED'\|'PRIVATE'` | The scope of the default sharing for new filters and dashboards:<br/><br/> *  `AUTHENTICATED` Shared with all logged-in users.<br/> *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.<br/> *  `PRIVATE` Not shared with any users. |


## Get Share Permissions
<a name="getSharePermissions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filter-sharing/#api-rest-api-3-filter-id-permission-get

Returns the share permissions for a filter.
A filter can be shared with groups, projects, all logged-in users, or the public.
Sharing with all logged-in users or the public is known as a global share permission

This operation can be accessed anonymously

**"Permissions" required:** None, however, share permissions are only returned for:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getSharePermissions(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |

#### Response


## Add Share Permission
<a name="addSharePermission"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filter-sharing/#api-rest-api-3-filter-id-permission-post

Add a share permissions to a filter.
If you add a global share permission (one for all logged-in users or the public) it will overwrite all share permissions for the filter

Be aware that this operation uses different objects for updating share permissions compared to "Update filter"

**"Permissions" required:** *Share dashboards and filters* "global permission" and the user must own the filter.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var array $response */
$response = $client->addSharePermission(
    request: new Schema\SharePermissionInputBean(
        groupname: 'jira-administrators',
        rights: '1',
        type: 'group',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SharePermissionInputBean`](/docs/schema/share-permission-input-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'user'\|`<br/>`'project'\|`<br/>`'group'\|`<br/>`'projectRole'\|`<br/>`'global'\|`<br/>`'authenticated'` | The type of the share permission.Specify the type as follows:<br/><br/> *  `user` Share with a user.<br/> *  `group` Share with a group. Specify `groupname` as well.<br/> *  `project` Share with a project. Specify `projectId` as well.<br/> *  `projectRole` Share with a project role in a project. Specify `projectId` and `projectRoleId` as well.<br/> *  `global` Share globally, including anonymous users. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.<br/> *  `authenticated` Share with all logged-in users. This shows as `loggedin` in the response. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set. |
| `accountId` | `string` | The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user. |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products.For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. Cannot be provided with `groupname`. |
| `groupname` | `string` | The name of the group to share the filter with. Set `type` to `group`. Please note that the name of a group is mutable, to reliably identify a group use `groupId`. |
| `projectId` | `string` | The ID of the project to share the filter with. Set `type` to `project`. |
| `projectRoleId` | `string` | The ID of the project role to share the filter with. Set `type` to `projectRole` and the `projectId` for the project that the role is in. |
| `rights` | `int` | The rights for the share permission. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |

#### Response


## Get Share Permission
<a name="getSharePermission"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filter-sharing/#api-rest-api-3-filter-id-permission-permission-id-get

Returns a share permission for a filter.
A filter can be shared with groups, projects, all logged-in users, or the public.
Sharing with all logged-in users or the public is known as a global share permission

This operation can be accessed anonymously

**"Permissions" required:** None, however, a share permission is only returned for:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\SharePermission $response */
$response = $client->getSharePermission(
    id: 1234,
    permissionId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |
| `permissionId` | `int` | The ID of the share permission. |

#### Response

Source: [`Jira\Client\Schema\SharePermission`](/docs/schema/share-permission.md)

Details of a share permission for the filter.

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'user'\|`<br/>`'group'\|`<br/>`'project'\|`<br/>`'projectRole'\|`<br/>`'global'\|`<br/>`'loggedin'\|`<br/>`'authenticated'\|`<br/>`'project-unknown'` | The type of share permission:<br/><br/> *  `user` Shared with a user.<br/> *  `group` Shared with a group. If set in a request, then specify `sharePermission.group` as well.<br/> *  `project` Shared with a project. If set in a request, then specify `sharePermission.project` as well.<br/> *  `projectRole` Share with a project role in a project. This value is not returned in responses. It is used in requests, where it needs to be specify with `projectId` and `projectRoleId`.<br/> *  `global` Shared globally. If set in a request, no other `sharePermission` properties need to be specified.<br/> *  `loggedin` Shared with all logged-in users. Note: This value is set in a request by specifying `authenticated` as the `type`.<br/> *  `project-unknown` Shared with a project that the user does not have access to. Cannot be set in a request. |
| `group` | [`GroupName`](/docs/schema/group-name.md) | The group that the filter is shared with. For a request, specify the `groupId` or `name` property for the group. As a group's name can change, use of `groupId` is recommended. |
| `id` | `int` | The unique identifier of the share permission. |
| `project` | [`Project`](/docs/schema/project.md) | The project that the filter is shared with. This is similar to the project object returned by [Get project](#api-rest-api-3-project-projectIdOrKey-get) but it contains a subset of the properties, which are: `self`, `id`, `key`, `assigneeType`, `name`, `roles`, `avatarUrls`, `projectType`, `simplified`.  <br/>For a request, specify the `id` for the project. |
| `role` | [`ProjectRole`](/docs/schema/project-role.md) | The project role that the filter is shared with.  <br/>For a request, specify the `id` for the role. You must also specify the `project` object and `id` for the project that the role is in. |
| `user` | [`UserBean`](/docs/schema/user-bean.md) | The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user. |


## Delete Share Permission
<a name="deleteSharePermission"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filter-sharing/#api-rest-api-3-filter-id-permission-permission-id-delete

Deletes a share permission from a filter

**"Permissions" required:** Permission to access Jira and the user must own the filter.

### Example

```php
/** @var true $response */
$response = $client->deleteSharePermission(
    id: 1234,
    permissionId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |
| `permissionId` | `int` | The ID of the share permission. |

#### Response

`true`
