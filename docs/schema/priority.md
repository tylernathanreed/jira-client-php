# Priority

An issue priority.

Source: [`Jira\Client\Schema\Priority`](src/Schema/Priority.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The avatarId of the avatar for the issue priority. This parameter is nullable and when set, this avatar references the universal avatar APIs. |
| `description` | `string` | The description of the issue priority. |
| `iconUrl` | `string` | The URL of the icon for the issue priority. |
| `id` | `string` | The ID of the issue priority. |
| `isDefault` | `bool` | Whether this priority is the default. |
| `name` | `string` | The name of the issue priority. |
| `schemes` | `ExpandPrioritySchemePage` | Priority schemes associated with the issue priority. |
| `self` | `string` | The URL of the issue priority. |
| `statusColor` | `string` | The color used to indicate the issue priority. |

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
