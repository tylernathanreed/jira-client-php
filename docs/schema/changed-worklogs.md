# Changed Worklogs

List of changed worklogs.

Source: [`Jira\Client\Schema\ChangedWorklogs`](/src/Schema/ChangedWorklogs.php)

| Property | Type | Description |
| --- | --- | --- |
| `lastPage` | `` |  |
| `nextPage` | `` | The URL of the next list of changed worklogs. |
| `self` | `` | The URL of this changed worklogs list. |
| `since` | `` | The datetime of the first worklog item in the list. |
| `until` | `` | The datetime of the last worklog item in the list. |
| `values` | `?list<ChangedWorklog>` | Changed worklog list. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getIdsOfWorklogsDeletedSince](/docs/operations/issue-worklogs.md#get-ids-of-worklogs-deleted-since) |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getIdsOfWorklogsModifiedSince](/docs/operations/issue-worklogs.md#get-ids-of-worklogs-modified-since) |

### Schema

*None*
