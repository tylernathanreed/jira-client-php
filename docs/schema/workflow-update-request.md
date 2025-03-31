# Workflow Update Request

The update workflows payload.

Source: [`Jira\Client\Schema\WorkflowUpdateRequest`](/src/Schema/WorkflowUpdateRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<WorkflowStatusUpdate>`](/docs/schemas/workflow-status-update.md) | The statuses to associate with the workflows. |
| `workflows` | [`?list<WorkflowUpdate>`](/docs/schemas/workflow-update.md) | The details of the workflows to update. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [updateWorkflows](/docs/operations/workflows.md#update-workflows) |

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowUpdateValidateRequestBean](/docs/schema/workflow-update-validate-request-bean.md) |
