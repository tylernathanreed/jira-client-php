# Remove Option From Issues Result


Source: [`Jira\Client\Schema\RemoveOptionFromIssuesResult`](/src/Schema/RemoveOptionFromIssuesResult.php)

| Property | Type | Description |
| --- | --- | --- |
| `errors` | `` | A collection of errors related to unchanged issues. The collection size is limited, which means not all errors may be returned. |
| `modifiedIssues` | `?list<int>` | The IDs of the modified issues. |
| `unmodifiedIssues` | `?list<int>` | The IDs of the unchanged issues, those issues where errors prevent modification. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [TaskProgressBeanRemoveOptionFromIssuesResult](/docs/schema/task-progress-bean-remove-option-from-issues-result.md) |
