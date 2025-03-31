# Issue Bulk Transition Payload

Issue Bulk Transition Payload

Source: [`Jira\Client\Schema\IssueBulkTransitionPayload`](/src/Schema/IssueBulkTransitionPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `bulkTransitionInputs` | [`list<BulkTransitionSubmitInput>`](/docs/schema/bulk-transition-submit-input.md) | List of objects and each object has two properties:

 *  Issues that will be bulk transitioned.
 *  TransitionId that corresponds to a specific transition of issues that share the same workflow. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being transitioned.

If `true`, dispatches a bulk notification email to users about the updates. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [submitBulkTransition](/docs/operations/issue-bulk-operations.md#submit-bulk-transition) |

### Schema

*None*
