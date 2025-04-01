# Project Roles

Source: [`Jira\Client\Operations\ProjectRoles`](/src/Operations/ProjectRoles.php)

## Operations

- [Get Project Roles For Project](#getProjectRoles)
- [Get Project Role For Project](#getProjectRole)
- [Get Project Role Details](#getProjectRoleDetails)
- [Get All Project Roles](#getAllProjectRoles)
- [Create Project Role](#createProjectRole)
- [Get Project Role By ID](#getProjectRoleById)
- [Fully Update Project Role](#fullyUpdateProjectRole)
- [Partial Update Project Role](#partialUpdateProjectRole)
- [Delete Project Role](#deleteProjectRole)

## Get Project Roles For Project
<a name="getProjectRoles"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-project-project-id-or-key-role-get

Returns a list of "project roles" for the project returning the name and self URL for each role

Note that all project roles are shared with all projects in Jira Cloud.
See "Get all project roles" for more information

This operation can be accessed anonymously

**"Permissions" required:** *Administer Projects* "project permission" for any project on the site or *Administer Jira* "global permission".
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->getProjectRoles(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |

#### Response

`true`
## Get Project Role For Project
<a name="getProjectRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-project-project-id-or-key-role-id-get

Returns a project role's details and actors associated with the project.
The list of actors is sorted by display name

To check whether a user belongs to a role based on their group memberships, use "Get user" with the `groups` expand parameter selected.
Then check whether the user keys and groups match with the actors returned for the project

This operation can be accessed anonymously

**"Permissions" required:** *Administer Projects* "project permission" for the project or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ProjectRole $response */
$response = $client->getProjectRole(
    projectIdOrKey: 'foo',
    id: 1234,
    excludeInactiveUsers: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |
| `excludeInactiveUsers` | `?bool` | Exclude inactive users. |

#### Response

Source: [`Jira\Client\Schema\ProjectRole`](/docs/schema/project-role.md)

Details about the roles in a project.

| Property | Type | Description |
| --- | --- | --- |
| `actors` | [`?list<RoleActor>`](/docs/schema/role-actor.md) | The list of users who act in this role. |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `currentUserRole` | `bool` | Whether the calling user is part of this role. |
| `default` | `bool` | Whether this role is the default role for the project |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |


## Get Project Role Details
<a name="getProjectRoleDetails"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-project-project-id-or-key-roledetails-get

Returns all "project roles" and the details for each role.
Note that the list of project roles is common to all projects

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer projects* "project permission" for the project.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getProjectRoleDetails(
    projectIdOrKey: 'foo',
    currentMember: false,
    excludeConnectAddons: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `currentMember` | `?bool` | Whether the roles should be filtered to include only those the user is assigned to. |
| `excludeConnectAddons` | `?bool` |  |

#### Response


## Get All Project Roles
<a name="getAllProjectRoles"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-role-get

Gets a list of all project roles, complete with project role details and default actors

### About project roles ###

"Project roles" are a flexible way to to associate users and groups with projects.
In Jira Cloud, the list of project roles is shared globally with all projects, but each project can have a different set of actors associated with it (unlike groups, which have the same membership throughout all Jira applications)

Project roles are used in "permission schemes", "email notification schemes", "issue security levels", "comment visibility", and workflow conditions

#### Members and actors ####

In the Jira REST API, a member of a project role is called an *actor*.
An *actor* is a group or user associated with a project role

Actors may be set as "default members" of the project role or set at the project level:

 - Default actors: Users and groups that are assigned to the project role for all newly created projects.
The default actors can be removed at the project level later if desired
 - Actors: Users and groups that are associated with a project role for a project, which may differ from the default actors.
This enables you to assign a user to different roles in different projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/#Specifying-'default-members'-for-a-project-role
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getAllProjectRoles();
```

### Request

#### Response


## Create Project Role
<a name="createProjectRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-role-post

Creates a new project role with no "default actors".
You can use the "Add default actors to project role" operation to add default actors to the project role after creating it

*Note that although a new project role is available to all projects upon creation, any default actors that are associated with the project role are not added to projects that existed prior to the role being created.*<

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectRole $response */
$response = $client->createProjectRole(new Schema\CreateUpdateRoleRequestBean(
    description: 'A project role that represents developers in a project',
    name: 'Developers',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateUpdateRoleRequestBean`](/docs/schema/create-update-role-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role. |
| `name` | `string` | The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role. |

#### Response

Source: [`Jira\Client\Schema\ProjectRole`](/docs/schema/project-role.md)

Details about the roles in a project.

| Property | Type | Description |
| --- | --- | --- |
| `actors` | [`?list<RoleActor>`](/docs/schema/role-actor.md) | The list of users who act in this role. |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `currentUserRole` | `bool` | Whether the calling user is part of this role. |
| `default` | `bool` | Whether this role is the default role for the project |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |


## Get Project Role By ID
<a name="getProjectRoleById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-role-id-get

Gets the project role details and the default actors associated with the role.
The list of default actors is sorted by display name

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ProjectRole $response */
$response = $client->getProjectRoleById(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |

#### Response

Source: [`Jira\Client\Schema\ProjectRole`](/docs/schema/project-role.md)

Details about the roles in a project.

| Property | Type | Description |
| --- | --- | --- |
| `actors` | [`?list<RoleActor>`](/docs/schema/role-actor.md) | The list of users who act in this role. |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `currentUserRole` | `bool` | Whether the calling user is part of this role. |
| `default` | `bool` | Whether this role is the default role for the project |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |


## Fully Update Project Role
<a name="fullyUpdateProjectRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-role-id-put

Updates the project role's name and description.
You must include both a name and a description in the request

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectRole $response */
$response = $client->fullyUpdateProjectRole(
    request: new Schema\CreateUpdateRoleRequestBean(
        description: 'A project role that represents developers in a project',
        name: 'Developers',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateUpdateRoleRequestBean`](/docs/schema/create-update-role-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role. |
| `name` | `string` | The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |

#### Response

Source: [`Jira\Client\Schema\ProjectRole`](/docs/schema/project-role.md)

Details about the roles in a project.

| Property | Type | Description |
| --- | --- | --- |
| `actors` | [`?list<RoleActor>`](/docs/schema/role-actor.md) | The list of users who act in this role. |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `currentUserRole` | `bool` | Whether the calling user is part of this role. |
| `default` | `bool` | Whether this role is the default role for the project |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |


## Partial Update Project Role
<a name="partialUpdateProjectRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-role-id-post

Updates either the project role's name or its description

You cannot update both the name and description at the same time using this operation.
If you send a request with a name and a description only the name is updated

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectRole $response */
$response = $client->partialUpdateProjectRole(
    request: new Schema\CreateUpdateRoleRequestBean(
        description: 'A project role that represents developers in a project',
        name: 'Developers',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateUpdateRoleRequestBean`](/docs/schema/create-update-role-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role. |
| `name` | `string` | The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |

#### Response

Source: [`Jira\Client\Schema\ProjectRole`](/docs/schema/project-role.md)

Details about the roles in a project.

| Property | Type | Description |
| --- | --- | --- |
| `actors` | [`?list<RoleActor>`](/docs/schema/role-actor.md) | The list of users who act in this role. |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `currentUserRole` | `bool` | Whether the calling user is part of this role. |
| `default` | `bool` | Whether this role is the default role for the project |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |


## Delete Project Role
<a name="deleteProjectRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-roles/#api-rest-api-3-role-id-delete

Deletes a project role.
You must specify a replacement project role if you wish to delete a project role that is in use

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteProjectRole(
    id: 1234,
    swap: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the project role to delete. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |
| `swap` | `?int` | The ID of the project role that will replace the one being deleted. The swap will attempt to swap the role in schemes (notifications, permissions, issue security), workflows, worklogs and comments. |

#### Response

`true`
