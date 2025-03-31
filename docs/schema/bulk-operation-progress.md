# Bulk Operation Progress


Source: [`Jira\Client\Schema\BulkOperationProgress`](/src/Schema/BulkOperationProgress.php)

| Property | Type | Description |
| --- | --- | --- |
| `created` | `string` | A timestamp of when the task was submitted. |
| `failedAccessibleIssues` | `object` | Map of issue IDs for which the operation failed and that the user has permission to view, to their one or more reasons for failure. These reasons are open-ended text descriptions of the error and are not selected from a predefined list of standard reasons. |
| `invalidOrInaccessibleIssueCount` | `int` | The number of issues that are either invalid or issues that the user doesn't have permission to view, regardless of the success or failure of the operation. |
| `processedAccessibleIssues` | `array` | List of issue IDs for which the operation was successful and that the user has permission to view. |
| `progressPercent` | `int` | Progress of the task as a percentage. |
| `started` | `string` | A timestamp of when the task was started. |
| `status` | `string` | The status of the task. |
| `submittedBy` | `User` |  |
| `taskId` | `string` | The ID of the task. |
| `totalIssueCount` | `int` | The number of issues that the bulk operation was attempted on. |
| `updated` | `string` | A timestamp of when the task progress was last updated. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [getBulkOperationProgress](/docs/operations/issue-bulk-operations.md#get-bulk-operation-progress) |

### Schema

*None*
