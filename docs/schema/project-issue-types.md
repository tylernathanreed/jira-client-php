# Project Issue Types

Deprecated.
See the "deprecation notice" for details

Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the requested workflows.
See: https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298

Source: [`Jira\Client\Schema\ProjectIssueTypes`](/src/Schema/ProjectIssueTypes.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypes` | `array` | IDs of the issue types |
| `project` | `ProjectId` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraStatus](/docs/schema/jira-status.md) |
| [JiraWorkflow](/docs/schema/jira-workflow.md) |
| [JiraWorkflowStatus](/docs/schema/jira-workflow-status.md) |
