# Workflow Transitions

The transitions of the workflow.

Source: [`Jira\Client\Schema\WorkflowTransitions`](/src/Schema/WorkflowTransitions.php)

| Property | Type | Description |
| --- | --- | --- |
| `actions` | [`?list<WorkflowRuleConfiguration>`](/docs/schemas/workflow-rule-configuration.md) | The post-functions of the transition. |
| `conditions` | `ConditionGroupConfiguration` |  |
| `customIssueEventId` | `string` | The custom event ID of the transition. |
| `description` | `string` | The description of the transition. |
| `id` | `string` | The ID of the transition. |
| `links` | [`?list<WorkflowTransitionLinks>`](/docs/schemas/workflow-transition-links.md) | The statuses the transition can start from, and the mapping of ports between the statuses. |
| `name` | `string` | The name of the transition. |
| `properties` | `array<string,string>` | The properties of the transition. |
| `toStatusReference` | `string` | The status the transition goes to. |
| `transitionScreen` | `WorkflowRuleConfiguration` |  |
| `triggers` | [`?list<WorkflowTrigger>`](/docs/schemas/workflow-trigger.md) | The triggers of the transition. |
| `type` | `'INITIAL'\|'GLOBAL'\|'DIRECTED'\|null` | The transition type. |
| `validators` | [`?list<WorkflowRuleConfiguration>`](/docs/schemas/workflow-rule-configuration.md) | The validators of the transition. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraWorkflow](/docs/schema/jira-workflow.md) |
