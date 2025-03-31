# Condition Group Update

The conditions group associated with the transition.

Source: [`Jira\Client\Schema\ConditionGroupUpdate`](/src/Schema/ConditionGroupUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `operation` | `'ANY'\|'ALL'` | Determines how the conditions in the group are evaluated. Accepts either `ANY` or `ALL`. If `ANY` is used, at least one condition in the group must be true for the group to evaluate to true. If `ALL` is used, all conditions in the group must be true for the group to evaluate to true. |
| `conditionGroups` | [`?list<ConditionGroupUpdate>`](/docs/schemas/condition-group-update.md) | The nested conditions of the condition group. |
| `conditions` | [`?list<WorkflowRuleConfiguration>`](/docs/schemas/workflow-rule-configuration.md) | The rules for this condition. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [TransitionUpdateDTO](/docs/schema/transition-update-d-t-o.md) |
