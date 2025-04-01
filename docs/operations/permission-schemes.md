# Permission Schemes

DummyDescription

Source: [`Jira\Client\Operations\PermissionSchemes`](/src/Operations/PermissionSchemes.php)

## Operations

- [Get All Permission Schemes](#getAllPermissionSchemes)
- [Create Permission Scheme](#createPermissionScheme)
- [Get Permission Scheme](#getPermissionScheme)
- [Update Permission Scheme](#updatePermissionScheme)
- [Delete Permission Scheme](#deletePermissionScheme)
- [Get Permission Scheme Grants](#getPermissionSchemeGrants)
- [Create Permission Grant](#createPermissionGrant)
- [Get Permission Scheme Grant](#getPermissionSchemeGrant)
- [Delete Permission Scheme Grant](#deletePermissionSchemeEntity)

## Get All Permission Schemes
<a name="getAllPermissionSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-get

Returns all permission schemes

### About permission schemes and grants ###

A permission scheme is a collection of permission grants.
A permission grant consists of a `holder` and a `permission`

#### Holder object ####

The `holder` object contains information about the user or group being granted the permission.
For example, the *Administer projects* permission is granted to a group named *Teams in space administrators*.
In this case, the type is `"type": "group"`, and the parameter is the group name, `"parameter": "Teams in space administrators"` and the value is group ID, `"value": "ca85fac0-d974-40ca-a615-7af99c48d24f"`

The `holder` object is defined by the following properties:

 - `type` Identifies the user or group (see the list of types below)
 - `parameter` As a group's name can change, use of `value` is recommended.
The value of this property depends on the `type`.
For example, if the `type` is a group, then you need to specify the group name
 - `value` The value of this property depends on the `type`.
If the `type` is a group, then you need to specify the group ID.
For other `type` it has the same value as `parameter`

The following `types` are available.
The expected values for `parameter` and `value` are given in parentheses (some types may not have a `parameter` or `value`):

 - `anyone` Grant for anonymous users
 - `applicationRole` Grant for users with access to the specified application (application name, application name).
See "Update product access settings" for more information
 - `assignee` Grant for the user currently assigned to an issue
 - `group` Grant for the specified group (`parameter` : group name, `value` : group ID)
 - `groupCustomField` Grant for a user in the group selected in the specified custom field (`parameter` : custom field ID, `value` : custom field ID)
 - `projectLead` Grant for a project lead
 - `projectRole` Grant for the specified project role (`parameter` :project role ID, `value` : project role ID)
 - `reporter` Grant for the user who reported the issue
 - `sd.customer.portal.only` Jira Service Desk only.
Grants customers permission to access the customer portal but not Jira.
See "Customizing Jira Service Desk permissions" for more information
 - `user` Grant for the specified user (`parameter` : user ID - historically this was the userkey but that is deprecated and the account ID should be used, `value` : user ID)
 - `userCustomField` Grant for a user selected in the specified custom field (`parameter` : custom field ID, `value` : custom field ID)

#### Built-in permissions ####

The "built-in Jira permissions" are listed below.
Apps can also define custom permissions.
See the "project permission" and "global permission" module documentation for more information

**Administration permissions**

 - `ADMINISTER_PROJECTS`
 - `EDIT_WORKFLOW`
 - `EDIT_ISSUE_LAYOUT`

**Project permissions**

 - `BROWSE_PROJECTS`
 - `MANAGE_SPRINTS_PERMISSION` (Jira Software only)
 - `SERVICEDESK_AGENT` (Jira Service Desk only)
 - `VIEW_DEV_TOOLS` (Jira Software only)
 - `VIEW_READONLY_WORKFLOW`

**Issue permissions**

 - `ASSIGNABLE_USER`
 - `ASSIGN_ISSUES`
 - `CLOSE_ISSUES`
 - `CREATE_ISSUES`
 - `DELETE_ISSUES`
 - `EDIT_ISSUES`
 - `LINK_ISSUES`
 - `MODIFY_REPORTER`
 - `MOVE_ISSUES`
 - `RESOLVE_ISSUES`
 - `SCHEDULE_ISSUES`
 - `SET_ISSUE_SECURITY`
 - `TRANSITION_ISSUES`

**Voters and watchers permissions**

 - `MANAGE_WATCHERS`
 - `VIEW_VOTERS_AND_WATCHERS`

**Comments permissions**

 - `ADD_COMMENTS`
 - `DELETE_ALL_COMMENTS`
 - `DELETE_OWN_COMMENTS`
 - `EDIT_ALL_COMMENTS`
 - `EDIT_OWN_COMMENTS`

**Attachments permissions**

 - `CREATE_ATTACHMENTS`
 - `DELETE_ALL_ATTACHMENTS`
 - `DELETE_OWN_ATTACHMENTS`

**Time tracking permissions**

 - `DELETE_ALL_WORKLOGS`
 - `DELETE_OWN_WORKLOGS`
 - `EDIT_ALL_WORKLOGS`
 - `EDIT_OWN_WORKLOGS`
 - `WORK_ON_ISSUES`

**"Permissions" required:** Permission to access Jira.
See: https://confluence.atlassian.com/x/3YxjL
See: https://confluence.atlassian.com/x/24dKLg
See: https://confluence.atlassian.com/x/yodKLg
See: https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/
See: https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/

### Example

```php
/** @var Schema\PermissionSchemes $response */
$response = $client->getAllPermissionSchemes(
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

#### Response

Source: [`Jira\Client\Schema\PermissionSchemes`](/docs/schema/permission-schemes.md)

List of all permission schemes.

| Property | Type | Description |
| --- | --- | --- |
| `permissionSchemes` | [`?list<PermissionScheme>`](/docs/schema/permission-scheme.md) | Permission schemes list. |


## Create Permission Scheme
<a name="createPermissionScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-post

Creates a new permission scheme.
You can create a permission scheme with or without defining a set of permission grants

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PermissionScheme $response */
$response = $client->createPermissionScheme(
    request: new Schema\PermissionScheme(
        description: 'description',
        name: 'Example permission scheme',
        permissions: [
                [
                    'holder' => [
                        'parameter' => 'jira-core-users',
                        'type' => 'group',
                        'value' => 'ca85fac0-d974-40ca-a615-7af99c48d24f',
                    ],
                    'permission' => 'ADMINISTER_PROJECTS',
                ],
            ],
    )
    expand: null,
);
```

### Request

#### Request Body

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

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

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


## Get Permission Scheme
<a name="getPermissionScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-get

Returns a permission scheme

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PermissionScheme $response */
$response = $client->getPermissionScheme(
    schemeId: 1234,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme to return. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

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


## Update Permission Scheme
<a name="updatePermissionScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-put

Updates a permission scheme.
Below are some important things to note when using this resource:

 - If a permissions list is present in the request, then it is set in the permission scheme, overwriting *all existing* grants
 - If you want to update only the name and description, then do not send a permissions list in the request
 - Sending an empty list will remove all permission grants from the permission scheme

If you want to add or delete a permission grant instead of updating the whole list, see "Create permission grant" or "Delete permission scheme entity"

See "About permission schemes and grants" for more details

**"Permissions" required:** *Administer Jira* "global permission".
See: ../api-group-permission-schemes/#about-permission-schemes-and-grants
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PermissionScheme $response */
$response = $client->updatePermissionScheme(
    request: new Schema\PermissionScheme(
        description: 'description',
        name: 'Example permission scheme',
        permissions: [
                [
                    'holder' => [
                        'parameter' => 'jira-core-users',
                        'type' => 'group',
                        'value' => 'ca85fac0-d974-40ca-a615-7af99c48d24f',
                    ],
                    'permission' => 'ADMINISTER_PROJECTS',
                ],
            ],
    )
    schemeId: 1234,
    expand: null,
);
```

### Request

#### Request Body

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

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme to update. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

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


## Delete Permission Scheme
<a name="deletePermissionScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-delete

Deletes a permission scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deletePermissionScheme(
    schemeId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme being deleted. |

#### Response

`true`
## Get Permission Scheme Grants
<a name="getPermissionSchemeGrants"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-permission-get

Returns all permission grants for a permission scheme

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PermissionGrants $response */
$response = $client->getPermissionSchemeGrants(
    schemeId: 1234,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:<br/><br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `user` Returns information about the user who is granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `all` Returns all expandable information. |

#### Response

Source: [`Jira\Client\Schema\PermissionGrants`](/docs/schema/permission-grants.md)

List of permission grants.

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional permission grant details in the response. |
| `permissions` | [`?list<PermissionGrant>`](/docs/schema/permission-grant.md) | Permission grants list. |


## Create Permission Grant
<a name="createPermissionGrant"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-permission-post

Creates a permission grant in a permission scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PermissionGrant $response */
$response = $client->createPermissionGrant(
    request: new Schema\PermissionGrant(
        holder: [
                'parameter' => 'jira-core-users',
                'type' => 'group',
                'value' => 'ca85fac0-d974-40ca-a615-7af99c48d24f',
            ],
        permission: 'ADMINISTER_PROJECTS',
    )
    schemeId: 1234,
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\PermissionGrant`](/docs/schema/permission-grant.md)

Details about a permission granted to a user or group.

| Property | Type | Description |
| --- | --- | --- |
| `holder` | [`PermissionHolder`](/docs/schema/permission-holder.md) | The user or group being granted the permission. It consists of a `type`, a type-dependent `parameter` and a type-dependent `value`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information. |
| `id` | `int` | The ID of the permission granted details. |
| `permission` | `string` | The permission to grant. This permission can be one of the built-in permissions or a custom permission added by an app. See [Built-in permissions](../api-group-permission-schemes/#built-in-permissions) in *Get all permission schemes* for more information about the built-in permissions. See the [project permission](https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/) and [global permission](https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/) module documentation for more information about custom permissions. |
| `self` | `string` | The URL of the permission granted details. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme in which to create a new permission grant. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:<br/><br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `user` Returns information about the user who is granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `all` Returns all expandable information. |

#### Response

Source: [`Jira\Client\Schema\PermissionGrant`](/docs/schema/permission-grant.md)

Details about a permission granted to a user or group.

| Property | Type | Description |
| --- | --- | --- |
| `holder` | [`PermissionHolder`](/docs/schema/permission-holder.md) | The user or group being granted the permission. It consists of a `type`, a type-dependent `parameter` and a type-dependent `value`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information. |
| `id` | `int` | The ID of the permission granted details. |
| `permission` | `string` | The permission to grant. This permission can be one of the built-in permissions or a custom permission added by an app. See [Built-in permissions](../api-group-permission-schemes/#built-in-permissions) in *Get all permission schemes* for more information about the built-in permissions. See the [project permission](https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/) and [global permission](https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/) module documentation for more information about custom permissions. |
| `self` | `string` | The URL of the permission granted details. |


## Get Permission Scheme Grant
<a name="getPermissionSchemeGrant"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-permission-permission-id-get

Returns a permission grant

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PermissionGrant $response */
$response = $client->getPermissionSchemeGrant(
    schemeId: 1234,
    permissionId: 1234,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme. |
| `permissionId` | `int` | The ID of the permission grant. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `permissions` Returns all permission grants for each permission scheme.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

#### Response

Source: [`Jira\Client\Schema\PermissionGrant`](/docs/schema/permission-grant.md)

Details about a permission granted to a user or group.

| Property | Type | Description |
| --- | --- | --- |
| `holder` | [`PermissionHolder`](/docs/schema/permission-holder.md) | The user or group being granted the permission. It consists of a `type`, a type-dependent `parameter` and a type-dependent `value`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information. |
| `id` | `int` | The ID of the permission granted details. |
| `permission` | `string` | The permission to grant. This permission can be one of the built-in permissions or a custom permission added by an app. See [Built-in permissions](../api-group-permission-schemes/#built-in-permissions) in *Get all permission schemes* for more information about the built-in permissions. See the [project permission](https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/) and [global permission](https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/) module documentation for more information about custom permissions. |
| `self` | `string` | The URL of the permission granted details. |


## Delete Permission Scheme Grant
<a name="deletePermissionSchemeEntity"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#api-rest-api-3-permissionscheme-scheme-id-permission-permission-id-delete

Deletes a permission grant from a permission scheme.
See "About permission schemes and grants" for more details

**"Permissions" required:** *Administer Jira* "global permission".
See: ../api-group-permission-schemes/#about-permission-schemes-and-grants
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deletePermissionSchemeEntity(
    schemeId: 1234,
    permissionId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `schemeId` | `int` | The ID of the permission scheme to delete the permission grant from. |
| `permissionId` | `int` | The ID of the permission grant to delete. |

#### Response

`true`
