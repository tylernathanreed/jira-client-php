# Role Actor

Details about a user assigned to a project role.

Source: [`Jira\Client\Schema\RoleActor`](/src/Schema/RoleActor.php)

| Property | Type | Description |
| --- | --- | --- |
| `actorGroup` | `` |  |
| `actorUser` | `` |  |
| `avatarUrl` | `` | The avatar of the role actor. |
| `displayName` | `` | The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name. |
| `id` | `` | The ID of the role actor. |
| `name` | `` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `type` | `'atlassian-group-role-actor'|'atlassian-user-role-actor'|null` | The type of role actor. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ProjectRole](/docs/schema/project-role.md) |
