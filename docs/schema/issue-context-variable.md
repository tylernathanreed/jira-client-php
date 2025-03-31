# Issue Context Variable

An "issue" specified by ID or key.
All the fields of the issue object are available in the Jira expression.
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue

Source: [`Jira\Client\Schema\IssueContextVariable`](/src/Schema/IssueContextVariable.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` | Type of custom context variable. |
| `id` | `int` | The issue ID. |
| `key` | `string` | The issue key. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CustomContextVariable](/docs/schema/custom-context-variable.md) |
