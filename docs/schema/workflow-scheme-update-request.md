# Workflow Scheme Update Request

The update workflow scheme payload.

Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequest`](/src/Schema/WorkflowSchemeUpdateRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The new description for this workflow scheme. |
| `id` | `string` | The ID of this workflow scheme. |
| `name` | `string` | The new name for this workflow scheme. |
| `version` | `DocumentVersion` |  |
| `defaultWorkflowId` | `string` | The ID of the workflow for issue types without having a mapping defined in this workflow scheme. Only used in global-scoped workflow schemes. If the `defaultWorkflowId` isn't specified, this is set to *Jira Workflow (jira)*. |
| `statusMappingsByIssueTypeOverride` | `?list<MappingsByIssueTypeOverride>` | Overrides, for the selected issue types, any status mappings provided in `statusMappingsByWorkflows`. Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has. Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`. |
| `statusMappingsByWorkflows` | `?list<MappingsByWorkflow>` | The status mappings by workflows. Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has. Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`. |
| `workflowsForIssueTypes` | `?list<WorkflowSchemeAssociation>` | Mappings from workflows to issue types. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateSchemes](/docs/operations/workflow-schemes.md#update-schemes) |

### Schema

*None*
