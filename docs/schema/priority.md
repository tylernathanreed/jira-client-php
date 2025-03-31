# Priority

An issue priority.

Source: [`Jira\Client\Schema\Priority`](/src/Schema/Priority.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `` | The avatarId of the avatar for the issue priority. This parameter is nullable and when set, this avatar references the universal avatar APIs. |
| `description` | `` | The description of the issue priority. |
| `iconUrl` | `` | The URL of the icon for the issue priority. |
| `id` | `` | The ID of the issue priority. |
| `isDefault` | `` | Whether this priority is the default. |
| `name` | `` | The name of the issue priority. |
| `schemes` | `` | Priority schemes associated with the issue priority. |
| `self` | `` | The URL of the issue priority. |
| `statusColor` | `` | The color used to indicate the issue priority. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [getPriorities](/docs/operations/issue-priorities.md#get-priorities) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [getPriority](/docs/operations/issue-priorities.md#get-priority) |

### Schema

| Group | Operation |
| --- | --- |
| [Fields](/docs/schema/fields.md) |
| [PageBeanPriority](/docs/schema/page-bean-priority.md) |
