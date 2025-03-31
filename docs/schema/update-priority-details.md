# Update Priority Details

Details of an issue priority.

Source: [`Jira\Client\Schema\UpdatePriorityDetails`](src/Schema/UpdatePriorityDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID for the avatar for the priority. This parameter is nullable and both iconUrl and avatarId cannot be defined. |
| `description` | `string` | The description of the priority. |
| `iconUrl` | `string` | The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used. Both iconUrl and avatarId cannot be defined. |
| `name` | `string` | The name of the priority. Must be unique. |
| `statusColor` | `string` | The status color of the priority in 3-digit or 6-digit hexadecimal format. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [updatePriority](/docs/operations/issue-priorities.md#update-priority) |

### Schema

*None*
