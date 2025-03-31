# Jira Status

Details of a status.

Source: [`Jira\Client\Schema\JiraStatus`](/src/Schema/JiraStatus.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the status. |
| `id` | `string` | The ID of the status. |
| `name` | `string` | The name of the status. |
| `scope` | `StatusScope` |  |
| `statusCategory` | `string` | The category of the status. |
| `usages` | `array` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

Projects and issue types where the status is used. Only available if the `usages` expand is requested. |
| `workflowUsages` | `array` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

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
