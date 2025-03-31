# Project Avatars

List of project avatars.

Source: [`Jira\Client\Schema\ProjectAvatars`](/src/Schema/ProjectAvatars.php)

| Property | Type | Description |
| --- | --- | --- |
| `custom` | `?list<[Avatar](/src/Schema/Avatar.php)>` | List of avatars added to Jira. These avatars may be deleted. |
| `system` | `?list<[Avatar](/src/Schema/Avatar.php)>` | List of avatars included with Jira. These avatars cannot be deleted. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectAvatars](/docs/operations/project-avatars.md) | [getAllProjectAvatars](/docs/operations/project-avatars.md#get-all-project-avatars) |

### Schema

*None*
