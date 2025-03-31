# Workflow Create

The details of the workflows to create.

Source: [`Jira\Client\Schema\WorkflowCreate`](/src/Schema/WorkflowCreate.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the workflow to create. |
| `statuses` | [`list<StatusLayoutUpdate>`](/src/Schema/StatusLayoutUpdate.php) | The statuses associated with this workflow. |
| `transitions` | [`list<TransitionUpdateDTO>`](/src/Schema/TransitionUpdateDTO.php) | The transitions of this workflow. |
| `description` | `string` | The description of the workflow to create. |
| `startPointLayout` | `WorkflowLayout` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCreateRequest](/docs/schema/workflow-create-request.md) |
