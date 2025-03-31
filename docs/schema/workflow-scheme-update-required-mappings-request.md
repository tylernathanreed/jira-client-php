# Workflow Scheme Update Required Mappings Request

The request payload to get the required mappings for updating a workflow scheme.

Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequiredMappingsRequest`](/src/Schema/WorkflowSchemeUpdateRequiredMappingsRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the workflow scheme. |
| `workflowsForIssueTypes` | [`list<WorkflowSchemeAssociation>`](/src/Schema/WorkflowSchemeAssociation.php) | The new workflow to issue type mappings for this workflow scheme. |
| `defaultWorkflowId` | `string` | The ID of the new default workflow for this workflow scheme. Only used in global-scoped workflow schemes. If it isn't specified, is set to *Jira Workflow (jira)*. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateWorkflowSchemeMappings](/docs/operations/workflow-schemes.md#update-workflow-scheme-mappings) |

### Schema

*None*
