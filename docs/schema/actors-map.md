# Actors Map


Source: [`Jira\Client\Schema\ActorsMap`](src/Schema/ActorsMap.php)

| Property | Type | Description |
| --- | --- | --- |
| `group` | `array` | The name of the group to add. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended. |
| `groupId` | `array` | The ID of the group to add. This parameter cannot be used with the `group` parameter. |
| `user` | `array` | The user account ID of the user to add. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectRoleActors](/docs/operations/project-role-actors.md) | [addActorUsers](/docs/operations/project-role-actors.md#add-actor-users) |

### Schema

*None*
