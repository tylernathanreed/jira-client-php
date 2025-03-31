# Issue Bulk Transition For Workflow


Source: [`Jira\Client\Schema\IssueBulkTransitionForWorkflow`](/src/Schema/IssueBulkTransitionForWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `isTransitionsFiltered` | `bool` | Indicates whether all the transitions of this workflow are available in the transitions list or not. |
| `issues` | `?list<string>` | List of issue keys from the request which are associated with this workflow. |
| `transitions` | [`?list<SimplifiedIssueTransition>`](/docs/schema/simplified-issue-transition.md) | List of transitions available for issues from the request which are associated with this workflow.<br/><br/> **This list includes only those transitions that are common across the issues in this workflow and do not involve any additional field updates.**  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [BulkTransitionGetAvailableTransitions](/docs/schema/bulk-transition-get-available-transitions.md) |
