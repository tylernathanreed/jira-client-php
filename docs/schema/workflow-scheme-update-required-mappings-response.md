# Workflow Scheme Update Required Mappings Response


Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequiredMappingsResponse`](/src/Schema/WorkflowSchemeUpdateRequiredMappingsResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `statusMappingsByIssueTypes` | [`?list<RequiredMappingByIssueType>`](/src/Schema/RequiredMappingByIssueType.php) | The list of required status mappings by issue type. |
| `statusMappingsByWorkflows` | [`?list<RequiredMappingByWorkflows>`](/src/Schema/RequiredMappingByWorkflows.php) | The list of required status mappings by workflow. |
| `statuses` | [`?list<StatusMetadata>`](/src/Schema/StatusMetadata.php) | The details of the statuses in the associated workflows. |
| `statusesPerWorkflow` | [`?list<StatusesPerWorkflow>`](/src/Schema/StatusesPerWorkflow.php) | The statuses associated with each workflow. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateWorkflowSchemeMappings](/docs/operations/workflow-schemes.md#update-workflow-scheme-mappings) |

### Schema

*None*
