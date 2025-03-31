# Watchers

The details of watchers on an issue.

Source: [`Jira\Client\Schema\Watchers`](/src/Schema/Watchers.php)

| Property | Type | Description |
| --- | --- | --- |
| `isWatching` | `bool` | Whether the calling user is watching this issue. |
| `self` | `string` | The URL of these issue watcher details. |
| `watchCount` | `int` | The number of users watching this issue. |
| `watchers` | `?list<[UserDetails](/src/Schema/UserDetails.php)>` | Details of the users watching this issue. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueWatchers](/docs/operations/issue-watchers.md) | [getIssueWatchers](/docs/operations/issue-watchers.md#get-issue-watchers) |

### Schema

*None*
