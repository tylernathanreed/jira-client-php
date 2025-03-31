# Transition

Details of a workflow transition.

Source: [`Jira\Client\Schema\Transition`](/src/Schema/Transition.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the transition. |
| `from` | `array` | The statuses the transition can start from. |
| `id` | `string` | The ID of the transition. |
| `name` | `string` | The name of the transition. |
| `to` | `string` | The status the transition goes to. |
| `type` | `string` | The type of the transition. |
| `properties` | `object` | The properties of the transition. |
| `rules` | `WorkflowRules` |  |
| `screen` | `TransitionScreenDetails` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Workflow](/docs/schema/workflow.md) |
