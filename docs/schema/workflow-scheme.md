# Workflow Scheme

Details about a workflow scheme.

Source: [`Jira\Client\Schema\WorkflowScheme`](/src/Schema/WorkflowScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [createWorkflowScheme](/docs/operations/workflow-schemes.md#create-workflow-scheme) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [getWorkflowScheme](/docs/operations/workflow-schemes.md#get-workflow-scheme) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateWorkflowScheme](/docs/operations/workflow-schemes.md#update-workflow-scheme) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateDefaultWorkflow](/docs/operations/workflow-schemes.md#update-default-workflow) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [deleteDefaultWorkflow](/docs/operations/workflow-schemes.md#delete-default-workflow) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [setWorkflowSchemeIssueType](/docs/operations/workflow-schemes.md#set-workflow-scheme-issue-type) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [deleteWorkflowSchemeIssueType](/docs/operations/workflow-schemes.md#delete-workflow-scheme-issue-type) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateWorkflowMapping](/docs/operations/workflow-schemes.md#update-workflow-mapping) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [createWorkflowSchemeDraftFromParent](/docs/operations/workflow-scheme-drafts.md#create-workflow-scheme-draft-from-parent) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [getWorkflowSchemeDraft](/docs/operations/workflow-scheme-drafts.md#get-workflow-scheme-draft) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [updateWorkflowSchemeDraft](/docs/operations/workflow-scheme-drafts.md#update-workflow-scheme-draft) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [updateDraftDefaultWorkflow](/docs/operations/workflow-scheme-drafts.md#update-draft-default-workflow) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [deleteDraftDefaultWorkflow](/docs/operations/workflow-scheme-drafts.md#delete-draft-default-workflow) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [setWorkflowSchemeDraftIssueType](/docs/operations/workflow-scheme-drafts.md#set-workflow-scheme-draft-issue-type) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [deleteWorkflowSchemeDraftIssueType](/docs/operations/workflow-scheme-drafts.md#delete-workflow-scheme-draft-issue-type) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [updateDraftWorkflowMapping](/docs/operations/workflow-scheme-drafts.md#update-draft-workflow-mapping) |

### Schema

| Schema |
| --- |
| [PageBeanWorkflowScheme](/docs/schema/page-bean-workflow-scheme.md) |
| [WorkflowSchemeAssociations](/docs/schema/workflow-scheme-associations.md) |
