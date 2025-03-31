# Workflow Update

The details of the workflows to update.

Source: [`Jira\Client\Schema\WorkflowUpdate`](/src/Schema/WorkflowUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `` | The ID of this workflow. |
| `statuses` | `list<StatusLayoutUpdate>` | The statuses associated with this workflow. |
| `transitions` | `list<TransitionUpdateDTO>` | The transitions of this workflow. |
| `version` | `` |  |
| `defaultStatusMappings` | `?list<StatusMigration>` | The mapping of old to new status ID. |
| `description` | `` | The new description for this workflow. |
| `startPointLayout` | `` |  |
| `statusMappings` | `?list<StatusMappingDTO>` | The mapping of old to new status ID for a specific project and issue type. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowUpdateRequest](/docs/schema/workflow-update-request.md) |
