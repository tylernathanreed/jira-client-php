# Condition Group Payload

The payload for creating a condition group in a workflow

Source: [`Jira\Client\Schema\ConditionGroupPayload`](/src/Schema/ConditionGroupPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditionGroup` | [`?list<ConditionGroupPayload>`](/docs/schema/condition-group-payload.md) | The nested conditions of the condition group. |
| `conditions` | [`?list<RulePayload>`](/docs/schema/rule-payload.md) | The rules for this condition. |
| `operation` | `'ANY'\|'ALL'\|null` | Determines how the conditions in the group are evaluated. Accepts either `ANY` or `ALL`. If `ANY` is used, at least one condition in the group must be true for the group to evaluate to true. If `ALL` is used, all conditions in the group must be true for the group to evaluate to true. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [TransitionPayload](/docs/schema/transition-payload.md) |
