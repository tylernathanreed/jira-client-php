# Bulk Transition Get Available Transitions

Bulk Transition Get Available Transitions Response.

Source: [`Jira\Client\Schema\BulkTransitionGetAvailableTransitions`](/src/Schema/BulkTransitionGetAvailableTransitions.php)

| Property | Type | Description |
| --- | --- | --- |
| `availableTransitions` | `?list<IssueBulkTransitionForWorkflow>` | List of available transitions for bulk transition operation for requested issues grouped by workflow |
| `endingBefore` | `` | The end cursor for use in pagination. |
| `startingAfter` | `` | The start cursor for use in pagination. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueBulkOperations](/docs/operations/issue-bulk-operations.md) | [getAvailableTransitions](/docs/operations/issue-bulk-operations.md#get-available-transitions) |

### Schema

*None*
