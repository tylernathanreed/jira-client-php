# Rule Payload

The payload for creating rules in a workflow

Source: [`Jira\Client\Schema\RulePayload`](/src/Schema/RulePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `parameters` | `array<string,string>` | The parameters of the rule |
| `ruleKey` | `string` | The key of the rule. See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/\#api-rest-api-3-workflows-capabilities-get |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [ConditionGroupPayload](/docs/schema/condition-group-payload.md) |
| [TransitionPayload](/docs/schema/transition-payload.md) |
