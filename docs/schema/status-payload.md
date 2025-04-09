# Status Payload

The payload for creating a status

Source: [`Jira\Client\Schema\StatusPayload`](/src/Schema/StatusPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the status |
| `name` | `string` | The name of the status |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The conflict strategy for the status already exists. FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters; NEW - Create a new entity |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `statusCategory` | `'TODO'\|'IN_PROGRESS'\|'DONE'\|null` | The status category of the status. The value is case-sensitive. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowCapabilityPayload](/docs/schema/workflow-capability-payload.md) |
