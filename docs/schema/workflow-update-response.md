# Workflow Update Response


Source: [`Jira\Client\Schema\WorkflowUpdateResponse`](/src/Schema/WorkflowUpdateResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<JiraWorkflowStatus>`](/src/Schema/JiraWorkflowStatus.php) | List of updated statuses. |
| `taskId` | `string` | If there is a [asynchronous task](#async-operations) operation, as a result of this update. |
| `workflows` | [`?list<JiraWorkflow>`](/src/Schema/JiraWorkflow.php) | List of updated workflows. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [updateWorkflows](/docs/operations/workflows.md#update-workflows) |

### Schema

*None*
