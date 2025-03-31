# Transition

Details of a workflow transition.

Source: [`Jira\Client\Schema\Transition`](/src/Schema/Transition.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `` | The description of the transition. |
| `from` | `list<string>` | The statuses the transition can start from. |
| `id` | `` | The ID of the transition. |
| `name` | `` | The name of the transition. |
| `to` | `` | The status the transition goes to. |
| `type` | `'global'|'initial'|'directed'` | The type of the transition. |
| `properties` | `array<string,mixed>` | The properties of the transition. |
| `rules` | `` |  |
| `screen` | `` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Workflow](/docs/schema/workflow.md) |
