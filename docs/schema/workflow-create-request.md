# Workflow Create Request

The create workflows payload.

Source: [`Jira\Client\Schema\WorkflowCreateRequest`](/src/Schema/WorkflowCreateRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `scope` | `WorkflowScope` |  |
| `statuses` | [`?list<WorkflowStatusUpdate>`](/docs/schema/workflow-status-update.md) | The statuses to associate with the workflows. |
| `workflows` | [`?list<WorkflowCreate>`](/docs/schema/workflow-create.md) | The details of the workflows to create. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [createWorkflows](/docs/operations/workflows.md#create-workflows) |

### Schema

| Schema |
| --- |
| [WorkflowCreateValidateRequest](/docs/schema/workflow-create-validate-request.md) |
