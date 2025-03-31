# Create Priority Details

Details of an issue priority.

Source: [`Jira\Client\Schema\CreatePriorityDetails`](/src/Schema/CreatePriorityDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the priority. Must be unique. |
| `statusColor` | `string` | The status color of the priority in 3-digit or 6-digit hexadecimal format. |
| `avatarId` | `int` | The ID for the avatar for the priority. Either the iconUrl or avatarId must be defined, but not both. This parameter is nullable and will become mandatory once the iconUrl parameter is deprecated. |
| `description` | `string` | The description of the priority. |
| `iconUrl` | `string` | The URL of an icon for the priority. Accepted protocols are HTTP and HTTPS. Built in icons can also be used. Either the iconUrl or avatarId must be defined, but not both. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [createPriority](/docs/operations/issue-priorities.md#create-priority) |

### Schema

*None*
