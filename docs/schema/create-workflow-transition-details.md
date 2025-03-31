# Create Workflow Transition Details

The details of a workflow transition.

Source: [`Jira\Client\Schema\CreateWorkflowTransitionDetails`](/src/Schema/CreateWorkflowTransitionDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the transition. The maximum length is 60 characters. |
| `to` | `string` | The status the transition goes to. |
| `type` | `'global'\|'initial'\|'directed'` | The type of the transition. |
| `description` | `string` | The description of the transition. The maximum length is 1000 characters. |
| `from` | `?list<string>` | The statuses the transition can start from. |
| `properties` | `array<string,string>` | The properties of the transition. |
| `rules` | `CreateWorkflowTransitionRulesDetails` | The rules of the transition. |
| `screen` | `CreateWorkflowTransitionScreenDetails` | The screen of the transition. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreateWorkflowDetails](/docs/schema/create-workflow-details.md) |
