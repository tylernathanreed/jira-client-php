# Workflow Status

Details of a workflow status.

Source: [`Jira\Client\Schema\WorkflowStatus`](/src/Schema/WorkflowStatus.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue status. |
| `name` | `string` | The name of the status in the workflow. |
| `properties` | `object` | Additional properties that modify the behavior of issues in this status. Supports the properties `jira.issue.editable` and `issueEditable` (deprecated) that indicate whether issues are editable. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Workflow](/docs/schema/workflow.md) |
