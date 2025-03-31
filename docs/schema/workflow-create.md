# Workflow Create

The details of the workflows to create.

Source: [`Jira\Client\Schema\WorkflowCreate`](/src/Schema/WorkflowCreate.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the workflow to create. |
| `statuses` | [`list<StatusLayoutUpdate>`](/docs/schema/status-layout-update.md) | The statuses associated with this workflow. |
| `transitions` | [`list<TransitionUpdateDTO>`](/docs/schema/transition-update-d-t-o.md) | The transitions of this workflow. |
| `description` | `string` | The description of the workflow to create. |
| `startPointLayout` | `WorkflowLayout` |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowCreateRequest](/docs/schema/workflow-create-request.md) |
