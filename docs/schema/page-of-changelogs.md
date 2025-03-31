# Page Of Changelogs

A page of changelogs.

Source: [`Jira\Client\Schema\PageOfChangelogs`](/src/Schema/PageOfChangelogs.php)

| Property | Type | Description |
| --- | --- | --- |
| `histories` | [`?list<Changelog>`](/src/Schema/Changelog.php) | The list of changelogs. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getChangeLogsByIds](/docs/operations/issues.md#get-change-logs-by-ids) |

### Schema

| Group | Operation |
| --- | --- |
| [IssueBean](/docs/schema/issue-bean.md) |
