# Jira Workflow

Details of a workflow.

Source: [`Jira\Client\Schema\JiraWorkflow`](/src/Schema/JiraWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `created` | `` | The creation date of the workflow. |
| `description` | `` | The description of the workflow. |
| `id` | `` | The ID of the workflow. |
| `isEditable` | `` | Indicates if the workflow can be edited. |
| `name` | `` | The name of the workflow. |
| `scope` | `` |  |
| `startPointLayout` | `` |  |
| `statuses` | `?list<WorkflowReferenceStatus>` | The statuses referenced in this workflow. |
| `taskId` | `` | If there is a current [asynchronous task](#async-operations) operation for this workflow. |
| `transitions` | `?list<WorkflowTransitions>` | The transitions of the workflow. Note that a transition can have either the deprecated `to`/`from` fields or the `toStatusReference`/`links` fields, but never both nor a combination. |
| `updated` | `` | The last edited date of the workflow. |
| `usages` | `?list<ProjectIssueTypes>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the requested workflows. |
| `version` | `` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCreateResponse](/docs/schema/workflow-create-response.md) |
| [WorkflowReadResponse](/docs/schema/workflow-read-response.md) |
| [WorkflowSearchResponse](/docs/schema/workflow-search-response.md) |
| [WorkflowUpdateResponse](/docs/schema/workflow-update-response.md) |
