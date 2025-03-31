# Workflow Rules

A collection of transition rules.

Source: [`Jira\Client\Schema\WorkflowRules`](/src/Schema/WorkflowRules.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditionsTree` | [`WorkflowCondition`](/docs/schema/workflow-condition.md) |  |
| `postFunctions` | [`?list<WorkflowTransitionRule>`](/docs/schema/workflow-transition-rule.md) | The workflow post functions. |
| `validators` | [`?list<WorkflowTransitionRule>`](/docs/schema/workflow-transition-rule.md) | The workflow validators. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [Transition](/docs/schema/transition.md) |
