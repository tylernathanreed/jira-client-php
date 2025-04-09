# Workflow Update

The details of the workflows to update.

Source: [`Jira\Client\Schema\WorkflowUpdate`](/src/Schema/WorkflowUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of this workflow. |
| `statuses` | [`list<StatusLayoutUpdate>`](/docs/schema/status-layout-update.md) | The statuses associated with this workflow. |
| `transitions` | [`list<TransitionUpdateDTO>`](/docs/schema/transition-update-dto.md) | The transitions of this workflow. |
| `version` | [`DocumentVersion`](/docs/schema/document-version.md) |  |
| `defaultStatusMappings` | [`?list<StatusMigration>`](/docs/schema/status-migration.md) | The mapping of old to new status ID. |
| `description` | `string` | The new description for this workflow. |
| `loopedTransitionContainerLayout` | [`WorkflowLayout`](/docs/schema/workflow-layout.md) |  |
| `startPointLayout` | [`WorkflowLayout`](/docs/schema/workflow-layout.md) |  |
| `statusMappings` | [`?list<StatusMappingDTO>`](/docs/schema/status-mapping-dto.md) | The mapping of old to new status ID for a specific project and issue type. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowUpdateRequest](/docs/schema/workflow-update-request.md) |
