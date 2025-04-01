# Status Mapping DTO 

The mapping of old to new status ID for a specific project and issue type.

Source: [`Jira\Client\Schema\StatusMappingDTO`](/src/Schema/StatusMappingDTO.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The issue type for the status mapping. |
| `projectId` | `string` | The project for the status mapping. |
| `statusMigrations` | [`list<StatusMigration>`](/docs/schema/status-migration.md) | The list of old and new status ID mappings for the specified project and issue type. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowUpdate](/docs/schema/workflow-update.md) |
