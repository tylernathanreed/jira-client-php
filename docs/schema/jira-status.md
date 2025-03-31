# Jira Status

Details of a status.

Source: [`Jira\Client\Schema\JiraStatus`](/src/Schema/JiraStatus.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `` | The description of the status. |
| `id` | `` | The ID of the status. |
| `name` | `` | The name of the status. |
| `scope` | `` |  |
| `statusCategory` | `'TODO'|'IN_PROGRESS'|'DONE'|null` | The category of the status. |
| `usages` | `?list<ProjectIssueTypes>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

Projects and issue types where the status is used. Only available if the `usages` expand is requested. |
| `workflowUsages` | `?list<WorkflowUsages>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

The workflows that use this status. Only available if the `workflowUsages` expand is requested. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Status](/docs/operations/status.md) | [getStatusesById](/docs/operations/status.md#get-statuses-by-id) |
| [Status](/docs/operations/status.md) | [createStatuses](/docs/operations/status.md#create-statuses) |

### Schema

| Group | Operation |
| --- | --- |
| [PageOfStatuses](/docs/schema/page-of-statuses.md) |
