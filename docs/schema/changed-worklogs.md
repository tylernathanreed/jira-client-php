# Changed Worklogs

List of changed worklogs.

Source: [`Jira\Client\Schema\ChangedWorklogs`](/src/Schema/ChangedWorklogs.php)

| Property | Type | Description |
| --- | --- | --- |
| `lastPage` | `bool` |  |
| `nextPage` | `string` | The URL of the next list of changed worklogs. |
| `self` | `string` | The URL of this changed worklogs list. |
| `since` | `int` | The datetime of the first worklog item in the list. |
| `until` | `int` | The datetime of the last worklog item in the list. |
| `values` | [`?list<ChangedWorklog>`](/src/Schema/ChangedWorklog.php) | Changed worklog list. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getIdsOfWorklogsDeletedSince](/docs/operations/issue-worklogs.md#get-ids-of-worklogs-deleted-since) |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getIdsOfWorklogsModifiedSince](/docs/operations/issue-worklogs.md#get-ids-of-worklogs-modified-since) |

### Schema

*None*
