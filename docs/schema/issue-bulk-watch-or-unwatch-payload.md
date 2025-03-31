# Issue Bulk Watch Or Unwatch Payload

Issue Bulk Watch Or Unwatch Payload

Source: [`Jira\Client\Schema\IssueBulkWatchOrUnwatchPayload`](src/Schema/IssueBulkWatchOrUnwatchPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `selectedIssueIdsOrKeys` | `array` | List of issue IDs or keys which are to be bulk watched or unwatched. These IDs or keys can be from different projects and issue types. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being watched or unwatched.

If `true`, dispatches a bulk notification email to users about the updates. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [submitBulkUnwatch](/docs/operations/issue-bulk-operations.md#submit-bulk-unwatch) |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [submitBulkWatch](/docs/operations/issue-bulk-operations.md#submit-bulk-watch) |

### Schema

*None*
