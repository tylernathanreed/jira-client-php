# Default Workflow

Details about the default workflow.

Source: [`Jira\Client\Schema\DefaultWorkflow`](src/Schema/DefaultWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `workflow` | `string` | The name of the workflow to set as the default workflow. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [getDefaultWorkflow](/docs/operations/workflow-schemes.md#get-default-workflow) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateDefaultWorkflow](/docs/operations/workflow-schemes.md#update-default-workflow) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [getDraftDefaultWorkflow](/docs/operations/workflow-scheme-drafts.md#get-draft-default-workflow) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [updateDraftDefaultWorkflow](/docs/operations/workflow-scheme-drafts.md#update-draft-default-workflow) |

### Schema

*None*
