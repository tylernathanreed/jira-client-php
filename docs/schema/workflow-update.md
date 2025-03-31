# Workflow Update

The details of the workflows to update.

Source: [`Jira\Client\Schema\WorkflowUpdate`](/src/Schema/WorkflowUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of this workflow. |
| `statuses` | [`list<StatusLayoutUpdate>`](/src/Schema/StatusLayoutUpdate.php) | The statuses associated with this workflow. |
| `transitions` | [`list<TransitionUpdateDTO>`](/src/Schema/TransitionUpdateDTO.php) | The transitions of this workflow. |
| `version` | `DocumentVersion` |  |
| `defaultStatusMappings` | [`?list<StatusMigration>`](/src/Schema/StatusMigration.php) | The mapping of old to new status ID. |
| `description` | `string` | The new description for this workflow. |
| `startPointLayout` | `WorkflowLayout` |  |
| `statusMappings` | [`?list<StatusMappingDTO>`](/src/Schema/StatusMappingDTO.php) | The mapping of old to new status ID for a specific project and issue type. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowUpdateRequest](/docs/schema/workflow-update-request.md) |
