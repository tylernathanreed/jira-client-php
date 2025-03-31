# Workflow Update

The details of the workflows to update.

Source: [`Jira\Client\Schema\WorkflowUpdate`](src/Schema/WorkflowUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of this workflow. |
| `statuses` | `array` | The statuses associated with this workflow. |
| `transitions` | `array` | The transitions of this workflow. |
| `version` | `DocumentVersion` |  |
| `defaultStatusMappings` | `array` | The mapping of old to new status ID. |
| `description` | `string` | The new description for this workflow. |
| `startPointLayout` | `WorkflowLayout` |  |
| `statusMappings` | `array` | The mapping of old to new status ID for a specific project and issue type. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowUpdateRequest](/docs/schema/workflow-update-request.md) |
