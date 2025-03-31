# Status Mapping D T O

The mapping of old to new status ID for a specific project and issue type.

Source: [`Jira\Client\Schema\StatusMappingDTO`](/src/Schema/StatusMappingDTO.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The issue type for the status mapping. |
| `projectId` | `string` | The project for the status mapping. |
| `statusMigrations` | `array` | The list of old and new status ID mappings for the specified project and issue type. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowUpdate](/docs/schema/workflow-update.md) |
