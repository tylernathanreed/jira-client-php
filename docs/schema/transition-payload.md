# Transition Payload

The payload for creating a transition in a workflow.
Can be DIRECTED, GLOBAL, SELF-LOOPED, GLOBAL LOOPED

Source: [`Jira\Client\Schema\TransitionPayload`](/src/Schema/TransitionPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `actions` | [`?list<RulePayload>`](/docs/schema/rule-payload.md) | The actions that are performed when the transition is made |
| `conditions` | [`ConditionGroupPayload`](/docs/schema/condition-group-payload.md) |  |
| `customIssueEventId` | `string` | Mechanism in Jira for triggering certain actions, like notifications, automations, etc. Unless a custom notification scheme is configure, it's better not to provide any value here |
| `description` | `string` | The description of the transition |
| `from` | [`?list<FromLayoutPayload>`](/docs/schema/from-layout-payload.md) | The statuses that the transition can be made from |
| `id` | `int` | The id of the transition |
| `name` | `string` | The name of the transition |
| `properties` | `array<string,string>` | The properties of the transition |
| `to` | [`ToLayoutPayload`](/docs/schema/to-layout-payload.md) |  |
| `transitionScreen` | [`RulePayload`](/docs/schema/rule-payload.md) |  |
| `triggers` | [`?list<RulePayload>`](/docs/schema/rule-payload.md) | The triggers that are performed when the transition is made |
| `type` | `'global'\|'initial'\|'directed'\|null` | The type of the transition |
| `validators` | [`?list<RulePayload>`](/docs/schema/rule-payload.md) | The validators that are performed when the transition is made |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowPayload](/docs/schema/workflow-payload.md) |
