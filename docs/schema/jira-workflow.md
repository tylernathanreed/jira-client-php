# Jira Workflow

Details of a workflow.

Source: [`Jira\Client\Schema\JiraWorkflow`](/src/Schema/JiraWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `created` | `string` | The creation date of the workflow. |
| `description` | `string` | The description of the workflow. |
| `id` | `string` | The ID of the workflow. |
| `isEditable` | `bool` | Indicates if the workflow can be edited. |
| `name` | `string` | The name of the workflow. |
| `scope` | `WorkflowScope` |  |
| `startPointLayout` | `WorkflowLayout` |  |
| `statuses` | [`?list<WorkflowReferenceStatus>`](/docs/schema/workflow-reference-status.md) | The statuses referenced in this workflow. |
| `taskId` | `string` | If there is a current [asynchronous task](#async-operations) operation for this workflow. |
| `transitions` | [`?list<WorkflowTransitions>`](/docs/schema/workflow-transitions.md) | The transitions of the workflow. Note that a transition can have either the deprecated `to`/`from` fields or the `toStatusReference`/`links` fields, but never both nor a combination. |
| `updated` | `string` | The last edited date of the workflow. |
| `usages` | [`?list<ProjectIssueTypes>`](/docs/schema/project-issue-types.md) | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the requested workflows. |
| `version` | `DocumentVersion` |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowCreateResponse](/docs/schema/workflow-create-response.md) |
| [WorkflowReadResponse](/docs/schema/workflow-read-response.md) |
| [WorkflowSearchResponse](/docs/schema/workflow-search-response.md) |
| [WorkflowUpdateResponse](/docs/schema/workflow-update-response.md) |
