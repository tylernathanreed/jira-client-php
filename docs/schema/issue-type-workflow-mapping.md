# Issue Type Workflow Mapping

Details about the mapping between an issue type and a workflow.

Source: [`Jira\Client\Schema\IssueTypeWorkflowMapping`](/src/Schema/IssueTypeWorkflowMapping.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueType` | `` | The ID of the issue type. Not required if updating the issue type-workflow mapping. |
| `updateDraftIfNeeded` | `` | Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping. |
| `workflow` | `` | The name of the workflow. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [getWorkflowSchemeIssueType](/docs/operations/workflow-schemes.md#get-workflow-scheme-issue-type) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [setWorkflowSchemeIssueType](/docs/operations/workflow-schemes.md#set-workflow-scheme-issue-type) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [getWorkflowSchemeDraftIssueType](/docs/operations/workflow-scheme-drafts.md#get-workflow-scheme-draft-issue-type) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [setWorkflowSchemeDraftIssueType](/docs/operations/workflow-scheme-drafts.md#set-workflow-scheme-draft-issue-type) |

### Schema

*None*
