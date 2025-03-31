# Bulk Transition Get Available Transitions

Bulk Transition Get Available Transitions Response.

Source: [`Jira\Client\Schema\BulkTransitionGetAvailableTransitions`](/src/Schema/BulkTransitionGetAvailableTransitions.php)

| Property | Type | Description |
| --- | --- | --- |
| `availableTransitions` | [`?list<IssueBulkTransitionForWorkflow>`](/docs/schemas/issue-bulk-transition-for-workflow.md) | List of available transitions for bulk transition operation for requested issues grouped by workflow |
| `endingBefore` | `string` | The end cursor for use in pagination. |
| `startingAfter` | `string` | The start cursor for use in pagination. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [getAvailableTransitions](/docs/operations/issue-bulk-operations.md#get-available-transitions) |

### Schema

*None*
