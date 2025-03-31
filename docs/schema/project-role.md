# Project Role

Details about the roles in a project.

Source: [`Jira\Client\Schema\ProjectRole`](src/Schema/ProjectRole.php)

| Property | Type | Description |
| --- | --- | --- |
| `actors` | `array` | The list of users who act in this role. |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `currentUserRole` | `bool` | Whether the calling user is part of this role. |
| `default` | `bool` | Whether this role is the default role for the project |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | `Scope` | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectRoles](/docs/operations/project-roles.md) | [getProjectRole](/docs/operations/project-roles.md#get-project-role) |
| [ProjectRoles](/docs/operations/project-roles.md) | [getAllProjectRoles](/docs/operations/project-roles.md#get-all-project-roles) |
| [ProjectRoles](/docs/operations/project-roles.md) | [createProjectRole](/docs/operations/project-roles.md#create-project-role) |
| [ProjectRoles](/docs/operations/project-roles.md) | [getProjectRoleById](/docs/operations/project-roles.md#get-project-role-by-id) |
| [ProjectRoles](/docs/operations/project-roles.md) | [fullyUpdateProjectRole](/docs/operations/project-roles.md#fully-update-project-role) |
| [ProjectRoles](/docs/operations/project-roles.md) | [partialUpdateProjectRole](/docs/operations/project-roles.md#partial-update-project-role) |
| [ProjectRoleActors](/docs/operations/project-role-actors.md) | [setActors](/docs/operations/project-role-actors.md#set-actors) |
| [ProjectRoleActors](/docs/operations/project-role-actors.md) | [addActorUsers](/docs/operations/project-role-actors.md#add-actor-users) |
| [ProjectRoleActors](/docs/operations/project-role-actors.md) | [getProjectRoleActorsForRole](/docs/operations/project-role-actors.md#get-project-role-actors-for-role) |
| [ProjectRoleActors](/docs/operations/project-role-actors.md) | [addProjectRoleActorsToRole](/docs/operations/project-role-actors.md#add-project-role-actors-to-role) |
| [ProjectRoleActors](/docs/operations/project-role-actors.md) | [deleteProjectRoleActorsFromRole](/docs/operations/project-role-actors.md#delete-project-role-actors-from-role) |

### Schema

| Group | Operation |
| --- | --- |
| [EventNotification](/docs/schema/event-notification.md) |
| [SharePermission](/docs/schema/share-permission.md) |
