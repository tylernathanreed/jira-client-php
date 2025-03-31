# Create Workflow Condition

A workflow transition condition.

Source: [`Jira\Client\Schema\CreateWorkflowCondition`](/src/Schema/CreateWorkflowCondition.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditions` | [`?list<CreateWorkflowCondition>`](/docs/schemas/create-workflow-condition.md) | The list of workflow conditions. |
| `configuration` | `array<string,mixed>` | EXPERIMENTAL. The configuration of the transition rule. |
| `operator` | `'AND'\|'OR'\|null` | The compound condition operator. |
| `type` | `string` | The type of the transition rule. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreateWorkflowTransitionRulesDetails](/docs/schema/create-workflow-transition-rules-details.md) |
