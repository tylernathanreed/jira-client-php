# Role Actor

Details about a user assigned to a project role.

Source: [`Jira\Client\Schema\RoleActor`](/src/Schema/RoleActor.php)

| Property | Type | Description |
| --- | --- | --- |
| `actorGroup` | [`ProjectRoleGroup`](/docs/schema/project-role-group.md) |  |
| `actorUser` | [`ProjectRoleUser`](/docs/schema/project-role-user.md) |  |
| `avatarUrl` | `string` | The avatar of the role actor. |
| `displayName` | `string` | The display name of the role actor. For users, depending on the user’s privacy setting, this may return an alternative value for the user's name. |
| `id` | `int` | The ID of the role actor. |
| `name` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `type` | `'atlassian-group-role-actor'\|`<br/>`'atlassian-user-role-actor'\|`<br/>`null` | The type of role actor. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [ProjectRole](/docs/schema/project-role.md) |
