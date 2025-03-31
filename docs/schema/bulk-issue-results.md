# Bulk Issue Results

The list of requested issues & fields.

Source: [`Jira\Client\Schema\BulkIssueResults`](/src/Schema/BulkIssueResults.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueErrors` | `array` | When Jira can't return an issue enumerated in a request due to a retriable error or payload constraint, we'll return the respective issue ID with a corresponding error message. This list is empty when there are no errors Issues which aren't found or that the user doesn't have permission to view won't be returned in this list. |
| `issues` | `array` | The list of issues. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [bulkFetchIssues](/docs/operations/issues.md#bulk-fetch-issues) |

### Schema

*None*
