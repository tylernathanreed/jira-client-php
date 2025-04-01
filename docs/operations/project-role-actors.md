# Project Role Actors

Source: [`Jira\Client\Operations\ProjectRoleActors`](/src/Operations/ProjectRoleActors.php)

## Operations

- [Set Actors For Project Role](#setActors)
- [Add Actors To Project Role](#addActorUsers)
- [Delete Actors From Project Role](#deleteActor)
- [Get Default Actors For Project Role](#getProjectRoleActorsForRole)
- [Add Default Actors To Project Role](#addProjectRoleActorsToRole)
- [Delete Default Actors From Project Role](#deleteProjectRoleActorsFromRole)

## Set Actors For Project Role
<a name="setActors"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-role-actors/#api-rest-api-3-project-project-id-or-key-role-id-put

Sets the actors for a project role for a project, replacing all existing actors

To add actors to the project without overwriting the existing list, use "Add actors to project role"

**"Permissions" required:** *Administer Projects* "project permission" for the project or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectRole $response */
$response = $client->setActors(
    request: new Schema\ProjectRoleActorsUpdateBean(
        categorisedActors: [
                'atlassian-group-role-actor-id' => [
                    0 => '952d12c3-5b5b-4d04-bb32-44d383afc4b2',
                ],
                'atlassian-user-role-actor' => [
                    0 => '12345678-9abc-def1-2345-6789abcdef12',
                ],
            ],
    )
    projectIdOrKey: 'foo',
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectRoleActorsUpdateBean`](/docs/schema/project-role-actors-update-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `categorisedActors` | `array<string,list<string>>` | The actors to add to the project role.<br/><br/>Add groups using:<br/><br/> *  `atlassian-group-role-actor` and a list of group names.<br/> *  `atlassian-group-role-actor-id` and a list of group IDs.<br/><br/>As a group's name can change, use of `atlassian-group-role-actor-id` is recommended. For example, `"atlassian-group-role-actor-id":["eef79f81-0b89-4fca-a736-4be531a10869","77f6ab39-e755-4570-a6ae-2d7a8df0bcb8"]`.<br/><br/>Add users using `atlassian-user-role-actor` and a list of account IDs. For example, `"atlassian-user-role-actor":["12345678-9abc-def1-2345-6789abcdef12", "abcdef12-3456-789a-bcde-f123456789ab"]`. |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
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


## Add Actors To Project Role
<a name="addActorUsers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-role-actors/#api-rest-api-3-project-project-id-or-key-role-id-post

Adds actors to a project role for the project

To replace all actors for the project, use "Set actors for project role"

This operation can be accessed anonymously

**"Permissions" required:** *Administer Projects* "project permission" for the project or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectRole $response */
$response = $client->addActorUsers(
    request: new Schema\ActorsMap(
        groupId: [
                '952d12c3-5b5b-4d04-bb32-44d383afc4b2',
            ],
    )
    projectIdOrKey: 'foo',
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ActorsMap`](/docs/schema/actors-map.md)

| Property | Type | Description |
| --- | --- | --- |
| `group` | `?list<string>` | The name of the group to add. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended. |
| `groupId` | `?list<string>` | The ID of the group to add. This parameter cannot be used with the `group` parameter. |
| `user` | `?list<string>` | The user account ID of the user to add. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
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


## Delete Actors From Project Role
<a name="deleteActor"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-role-actors/#api-rest-api-3-project-project-id-or-key-role-id-delete

Deletes actors from a project role for the project

To remove default actors from the project role, use "Delete default actors from project role"

This operation can be accessed anonymously

**"Permissions" required:** *Administer Projects* "project permission" for the project or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteActor(
    projectIdOrKey: 'foo',
    id: 1234,
    user: '5b10ac8d82e05b22cc7d4ef5',
    group: null,
    groupId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |
| `user` | `?string` | The user account ID of the user to remove from the project role. |
| `group` | `?string` | The name of the group to remove from the project role. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended. |
| `groupId` | `?string` | The ID of the group to remove from the project role. This parameter cannot be used with the `group` parameter. |

#### Response

`true`
## Get Default Actors For Project Role
<a name="getProjectRoleActorsForRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-role-actors/#api-rest-api-3-role-id-actors-get

Returns the "default actors" for the project role

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ProjectRole $response */
$response = $client->getProjectRoleActorsForRole(
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


## Add Default Actors To Project Role
<a name="addProjectRoleActorsToRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-role-actors/#api-rest-api-3-role-id-actors-post

Adds "default actors" to a role.
You may add groups or users, but you cannot add groups and users in the same request

Changing a project role's default actors does not affect project role members for projects already created

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectRole $response */
$response = $client->addProjectRoleActorsToRole(
    request: new Schema\ActorInputBean(
        user: [
                'admin',
            ],
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ActorInputBean`](/docs/schema/actor-input-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `group` | `?list<string>` | The name of the group to add as a default actor. This parameter cannot be used with the `groupId` parameter. As a group's name can change,use of `groupId` is recommended. This parameter accepts a comma-separated list. For example, `"group":["project-admin", "jira-developers"]`. |
| `groupId` | `?list<string>` | The ID of the group to add as a default actor. This parameter cannot be used with the `group` parameter This parameter accepts a comma-separated list. For example, `"groupId":["77f6ab39-e755-4570-a6ae-2d7a8df0bcb8", "0c011f85-69ed-49c4-a801-3b18d0f771bc"]`. |
| `user` | `?list<string>` | The account IDs of the users to add as default actors. This parameter accepts a comma-separated list. For example, `"user":["5b10a2844c20165700ede21g", "5b109f2e9729b51b54dc274d"]`. |

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


## Delete Default Actors From Project Role
<a name="deleteProjectRoleActorsFromRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-role-actors/#api-rest-api-3-role-id-actors-delete

Deletes the "default actors" from a project role.
You may delete a group or user, but you cannot delete a group and a user in the same request

Changing a project role's default actors does not affect project role members for projects already created

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ProjectRole $response */
$response = $client->deleteProjectRoleActorsFromRole(
    id: 1234,
    user: '5b10ac8d82e05b22cc7d4ef5',
    groupId: null,
    group: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs. |
| `user` | `?string` | The user account ID of the user to remove as a default actor. |
| `groupId` | `?string` | The group ID of the group to be removed as a default actor. This parameter cannot be used with the `group` parameter. |
| `group` | `?string` | The group name of the group to be removed as a default actor.This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended. |

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
