# Mappings By Issue Type Override

Overrides, for the selected issue types, any status mappings provided in `statusMappingsByWorkflows`.
Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has.
Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`.

Source: [`Jira\Client\Schema\MappingsByIssueTypeOverride`](/src/Schema/MappingsByIssueTypeOverride.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `` | The ID of the issue type for this mapping. |
| `statusMappings` | `list<WorkflowAssociationStatusMapping>` | The list of status mappings. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowSchemeUpdateRequest](/docs/schema/workflow-scheme-update-request.md) |
