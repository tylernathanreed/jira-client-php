# Workflow Update

The details of the workflows to update.

Source: [`Jira\Client\Schema\WorkflowUpdate`](/src/Schema/WorkflowUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of this workflow. |
| `statuses` | [`list<StatusLayoutUpdate>`](/docs/schema/status-layout-update.md) | The statuses associated with this workflow. |
| `transitions` | [`list<TransitionUpdateDTO>`](/docs/schema/transition-update-d-t-o.md) | The transitions of this workflow. |
| `version` | `DocumentVersion` |  |
| `defaultStatusMappings` | [`?list<StatusMigration>`](/docs/schema/status-migration.md) | The mapping of old to new status ID. |
| `description` | `string` | The new description for this workflow. |
| `startPointLayout` | `WorkflowLayout` |  |
| `statusMappings` | [`?list<StatusMappingDTO>`](/docs/schema/status-mapping-d-t-o.md) | The mapping of old to new status ID for a specific project and issue type. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowUpdateRequest](/docs/schema/workflow-update-request.md) |
