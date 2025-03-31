# Mappings By Workflow

The status mappings by workflows.
Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has.
Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`.

Source: [`Jira\Client\Schema\MappingsByWorkflow`](/src/Schema/MappingsByWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `newWorkflowId` | `string` | The ID of the new workflow. |
| `oldWorkflowId` | `string` | The ID of the old workflow. |
| `statusMappings` | `list<[WorkflowAssociationStatusMapping](/src/Schema/WorkflowAssociationStatusMapping.php)>` | The list of status mappings. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowSchemeUpdateRequest](/docs/schema/workflow-scheme-update-request.md) |
