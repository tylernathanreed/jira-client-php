# Page Of Worklogs

Paginated list of worklog details

Source: [`Jira\Client\Schema\PageOfWorklogs`](/src/Schema/PageOfWorklogs.php)

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |
| `worklogs` | [`?list<Worklog>`](/docs/schemas/worklog.md) | List of worklogs. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueWorklogs](/docs/operations/issue-worklogs.md) | [getIssueWorklog](/docs/operations/issue-worklogs.md#get-issue-worklog) |

### Schema

*None*
