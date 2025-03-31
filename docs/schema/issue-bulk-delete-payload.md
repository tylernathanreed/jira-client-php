# Issue Bulk Delete Payload

Issue Bulk Delete Payload

Source: [`Jira\Client\Schema\IssueBulkDeletePayload`](/src/Schema/IssueBulkDeletePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `selectedIssueIdsOrKeys` | `array` | List of issue IDs or keys which are to be bulk deleted. These IDs or keys can be from different projects and issue types. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being deleted.

If `true`, dispatches a bulk notification email to users about the updates. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [submitBulkDelete](/docs/operations/issue-bulk-operations.md#submit-bulk-delete) |

### Schema

*None*
