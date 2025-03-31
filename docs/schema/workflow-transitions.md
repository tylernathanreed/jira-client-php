# Workflow Transitions

The transitions of the workflow.

Source: [`Jira\Client\Schema\WorkflowTransitions`](src/Schema/WorkflowTransitions.php)

| Property | Type | Description |
| --- | --- | --- |
| `actions` | `array` | The post-functions of the transition. |
| `conditions` | `ConditionGroupConfiguration` |  |
| `customIssueEventId` | `string` | The custom event ID of the transition. |
| `description` | `string` | The description of the transition. |
| `id` | `string` | The ID of the transition. |
| `links` | `array` | The statuses the transition can start from, and the mapping of ports between the statuses. |
| `name` | `string` | The name of the transition. |
| `properties` | `object` | The properties of the transition. |
| `toStatusReference` | `string` | The status the transition goes to. |
| `transitionScreen` | `WorkflowRuleConfiguration` |  |
| `triggers` | `array` | The triggers of the transition. |
| `type` | `string` | The transition type. |
| `validators` | `array` | The validators of the transition. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraWorkflow](/docs/schema/jira-workflow.md) |
