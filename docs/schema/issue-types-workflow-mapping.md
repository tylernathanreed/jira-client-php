# Issue Types Workflow Mapping

Details about the mapping between issue types and a workflow.

Source: [`Jira\Client\Schema\IssueTypesWorkflowMapping`](/src/Schema/IssueTypesWorkflowMapping.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultMapping` | `bool` | Whether the workflow is the default workflow for the workflow scheme. |
| `issueTypes` | `array` | The list of issue type IDs. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`. |
| `workflow` | `string` | The name of the workflow. Optional if updating the workflow-issue types mapping. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [getWorkflow](/docs/operations/workflow-schemes.md#get-workflow) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateWorkflowMapping](/docs/operations/workflow-schemes.md#update-workflow-mapping) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [getDraftWorkflow](/docs/operations/workflow-scheme-drafts.md#get-draft-workflow) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [updateDraftWorkflowMapping](/docs/operations/workflow-scheme-drafts.md#update-draft-workflow-mapping) |

### Schema

*None*
