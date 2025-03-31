# Workflow Scheme Update Required Mappings Response


Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequiredMappingsResponse`](/src/Schema/WorkflowSchemeUpdateRequiredMappingsResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `statusMappingsByIssueTypes` | [`?list<RequiredMappingByIssueType>`](/docs/schema/required-mapping-by-issue-type.md) | The list of required status mappings by issue type. |
| `statusMappingsByWorkflows` | [`?list<RequiredMappingByWorkflows>`](/docs/schema/required-mapping-by-workflows.md) | The list of required status mappings by workflow. |
| `statuses` | [`?list<StatusMetadata>`](/docs/schema/status-metadata.md) | The details of the statuses in the associated workflows. |
| `statusesPerWorkflow` | [`?list<StatusesPerWorkflow>`](/docs/schema/statuses-per-workflow.md) | The statuses associated with each workflow. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateWorkflowSchemeMappings](/docs/operations/workflow-schemes.md#update-workflow-scheme-mappings) |

### Schema

*None*
