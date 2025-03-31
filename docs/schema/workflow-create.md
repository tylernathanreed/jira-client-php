# Workflow Create

The details of the workflows to create.

Source: [`Jira\Client\Schema\WorkflowCreate`](/src/Schema/WorkflowCreate.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The name of the workflow to create. |
| `statuses` | `list<StatusLayoutUpdate>` | The statuses associated with this workflow. |
| `transitions` | `list<TransitionUpdateDTO>` | The transitions of this workflow. |
| `description` | `` | The description of the workflow to create. |
| `startPointLayout` | `` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCreateRequest](/docs/schema/workflow-create-request.md) |
