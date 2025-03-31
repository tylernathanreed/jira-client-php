# Transition Update D T O

The transition update data.

Source: [`Jira\Client\Schema\TransitionUpdateDTO`](/src/Schema/TransitionUpdateDTO.php)

| Property | Type | Description |
| --- | --- | --- |
| `actions` | `?list<WorkflowRuleConfiguration>` | The post-functions of the transition. |
| `conditions` | `` |  |
| `customIssueEventId` | `` | The custom event ID of the transition. |
| `description` | `` | The description of the transition. |
| `id` | `` | The ID of the transition. |
| `links` | `?list<WorkflowTransitionLinks>` | The statuses the transition can start from, and the mapping of ports between the statuses. |
| `name` | `` | The name of the transition. |
| `properties` | `array<string,string>` | The properties of the transition. |
| `toStatusReference` | `` | The status the transition goes to. |
| `transitionScreen` | `` |  |
| `triggers` | `?list<WorkflowTrigger>` | The triggers of the transition. |
| `type` | `'INITIAL'|'GLOBAL'|'DIRECTED'|null` | The transition type. |
| `validators` | `?list<WorkflowRuleConfiguration>` | The validators of the transition. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCreate](/docs/schema/workflow-create.md) |
| [WorkflowUpdate](/docs/schema/workflow-update.md) |
