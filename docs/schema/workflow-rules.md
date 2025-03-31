# Workflow Rules

A collection of transition rules.

Source: [`Jira\Client\Schema\WorkflowRules`](/src/Schema/WorkflowRules.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditionsTree` | `WorkflowCondition` |  |
| `postFunctions` | [`?list<WorkflowTransitionRule>`](/docs/schema/workflow-transition-rule.md) | The workflow post functions. |
| `validators` | [`?list<WorkflowTransitionRule>`](/docs/schema/workflow-transition-rule.md) | The workflow validators. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Transition](/docs/schema/transition.md) |
