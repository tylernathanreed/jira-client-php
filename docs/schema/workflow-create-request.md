# Workflow Create Request

The create workflows payload.

Source: [`Jira\Client\Schema\WorkflowCreateRequest`](/src/Schema/WorkflowCreateRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `scope` | `WorkflowScope` |  |
| `statuses` | `?list<WorkflowStatusUpdate>` | The statuses to associate with the workflows. |
| `workflows` | `?list<WorkflowCreate>` | The details of the workflows to create. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [createWorkflows](/docs/operations/workflows.md#create-workflows) |

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCreateValidateRequest](/docs/schema/workflow-create-validate-request.md) |
