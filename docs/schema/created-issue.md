# Created Issue

Details about a created issue or subtask.

Source: [`Jira\Client\Schema\CreatedIssue`](/src/Schema/CreatedIssue.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the created issue or subtask. |
| `key` | `string` | The key of the created issue or subtask. |
| `self` | `string` | The URL of the created issue or subtask. |
| `transition` | `NestedResponse` | The response code and messages related to any requested transition. |
| `watchers` | `NestedResponse` | The response code and messages related to any requested watchers. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [createIssue](/docs/operations/issues.md#create-issue) |

### Schema

| Group | Operation |
| --- | --- |
| [CreatedIssues](/docs/schema/created-issues.md) |
