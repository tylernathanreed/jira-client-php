# Worklog

Details of a worklog.

Source: [`Jira\Client\Schema\Worklog`](/src/Schema/Worklog.php)

| Property | Type | Description |
| --- | --- | --- |
| `author` | `UserDetails` | Details of the user who created the worklog. |
| `comment` | `mixed` | A comment about the worklog in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). Optional when creating or updating a worklog. |
| `created` | `string` | The datetime on which the worklog was created. |
| `id` | `string` | The ID of the worklog record. |
| `issueId` | `string` | The ID of the issue this worklog is for. |
| `properties` | [`?list<EntityProperty>`](/src/Schema/EntityProperty.php) | Details of properties for the worklog. Optional when creating or updating a worklog. |
| `self` | `string` | The URL of the worklog item. |
| `started` | `string` | The datetime on which the worklog effort was started. Required when creating a worklog. Optional when updating a worklog. |
| `timeSpent` | `string` | The time spent working on the issue as days (\#d), hours (\#h), or minutes (\#m or \#). Required when creating a worklog if `timeSpentSeconds` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpentSecond` is provided. |
| `timeSpentSeconds` | `int` | The time in seconds spent working on the issue. Required when creating a worklog if `timeSpent` isn't provided. Optional when updating a worklog. Cannot be provided if `timeSpent` is provided. |
| `updateAuthor` | `UserDetails` | Details of the user who last updated the worklog. |
| `updated` | `string` | The datetime on which the worklog was last updated. |
| `visibility` | `Visibility` | Details about any restrictions in the visibility of the worklog. Optional when creating or updating a worklog. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [addWorklog](/docs/operations/issue-worklogs.md#add-worklog) |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getWorklog](/docs/operations/issue-worklogs.md#get-worklog) |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [updateWorklog](/docs/operations/issue-worklogs.md#update-worklog) |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getWorklogsForIds](/docs/operations/issue-worklogs.md#get-worklogs-for-ids) |

### Schema

| Group | Operation |
| --- | --- |
| [LegacyJackson1ListWorklog](/docs/schema/legacy-jackson1-list-worklog.md) |
| [PageOfWorklogs](/docs/schema/page-of-worklogs.md) |
