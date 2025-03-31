# Configuration

Details about the configuration of Jira.

Source: [`Jira\Client\Schema\Configuration`](/src/Schema/Configuration.php)

| Property | Type | Description |
| --- | --- | --- |
| `attachmentsEnabled` | `` | Whether the ability to add attachments to issues is enabled. |
| `issueLinkingEnabled` | `` | Whether the ability to link issues is enabled. |
| `subTasksEnabled` | `` | Whether the ability to create subtasks for issues is enabled. |
| `timeTrackingConfiguration` | `` | The configuration of time tracking. |
| `timeTrackingEnabled` | `` | Whether the ability to track time is enabled. This property is deprecated. |
| `unassignedIssuesAllowed` | `` | Whether the ability to create unassigned issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details. |
| `votingEnabled` | `` | Whether the ability for users to vote on issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details. |
| `watchingEnabled` | `` | Whether the ability for users to watch issues is enabled. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JiraSettings](/docs/operations/jira-settings.md) | [getConfiguration](/docs/operations/jira-settings.md#get-configuration) |

### Schema

*None*
