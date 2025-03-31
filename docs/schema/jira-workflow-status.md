# Jira Workflow Status

Details of a status.

Source: [`Jira\Client\Schema\JiraWorkflowStatus`](/src/Schema/JiraWorkflowStatus.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the status. |
| `id` | `string` | The ID of the status. |
| `name` | `string` | The name of the status. |
| `scope` | `WorkflowScope` |  |
| `statusCategory` | `'TODO'\|'IN_PROGRESS'\|'DONE'\|null` | The category of the status. |
| `statusReference` | `string` | The reference of the status. |
| `usages` | `?list<ProjectIssueTypes>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

The `statuses.usages` expand is an optional parameter that can be used when reading and updating statuses in Jira. It provides additional information about the projects and issue types associated with the requested statuses. |

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
