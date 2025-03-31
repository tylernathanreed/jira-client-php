# Issue Type With Status

Status details for an issue type.

Source: [`Jira\Client\Schema\IssueTypeWithStatus`](/src/Schema/IssueTypeWithStatus.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `` | The ID of the issue type. |
| `name` | `` | The name of the issue type. |
| `self` | `` | The URL of the issue type's status details. |
| `statuses` | `list<StatusDetails>` | List of status details for the issue type. |
| `subtask` | `` | Whether this issue type represents subtasks. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Projects](/docs/operations/projects.md) | [getAllStatuses](/docs/operations/projects.md#get-all-statuses) |

### Schema

| Group | Operation |
| --- | --- |
| [LegacyJackson1ListIssueTypeWithStatus](/docs/schema/legacy-jackson1-list-issue-type-with-status.md) |
