# Workflow Rules

A collection of transition rules.

Source: [`Jira\Client\Schema\WorkflowRules`](/src/Schema/WorkflowRules.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditionsTree` | `WorkflowCondition` |  |
| `postFunctions` | [`?list<WorkflowTransitionRule>`](/src/Schema/WorkflowTransitionRule.php) | The workflow post functions. |
| `validators` | [`?list<WorkflowTransitionRule>`](/src/Schema/WorkflowTransitionRule.php) | The workflow validators. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Transition](/docs/schema/transition.md) |
