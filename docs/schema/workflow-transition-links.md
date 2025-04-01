# Workflow Transition Links

The statuses the transition can start from, and the mapping of ports between the statuses.

Source: [`Jira\Client\Schema\WorkflowTransitionLinks`](/src/Schema/WorkflowTransitionLinks.php)

| Property | Type | Description |
| --- | --- | --- |
| `fromPort` | `int` | The port that the transition starts from. |
| `fromStatusReference` | `string` | The status that the transition starts from. |
| `toPort` | `int` | The port that the transition goes to. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [TransitionUpdateDTO](/docs/schema/transition-update-dto.md) |
| [WorkflowTransitions](/docs/schema/workflow-transitions.md) |
