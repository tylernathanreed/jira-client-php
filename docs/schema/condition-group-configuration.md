# Condition Group Configuration

The conditions group associated with the transition.

Source: [`Jira\Client\Schema\ConditionGroupConfiguration`](/src/Schema/ConditionGroupConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditionGroups` | [`?list<ConditionGroupConfiguration>`](/docs/schema/condition-group-configuration.md) | The nested conditions of the condition group. |
| `conditions` | [`?list<WorkflowRuleConfiguration>`](/docs/schema/workflow-rule-configuration.md) | The rules for this condition. |
| `operation` | `'ANY'\|'ALL'\|null` | Determines how the conditions in the group are evaluated. Accepts either `ANY` or `ALL`. If `ANY` is used, at least one condition in the group must be true for the group to evaluate to true. If `ALL` is used, all conditions in the group must be true for the group to evaluate to true. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowTransitions](/docs/schema/workflow-transitions.md) |
