# Votes

The details of votes on an issue.

Source: [`Jira\Client\Schema\Votes`](/src/Schema/Votes.php)

| Property | Type | Description |
| --- | --- | --- |
| `hasVoted` | `` | Whether the user making this request has voted on the issue. |
| `self` | `` | The URL of these issue vote details. |
| `voters` | `?list<User>` | List of the users who have voted on this issue. An empty list is returned when the calling user doesn't have the *View voters and watchers* project permission. |
| `votes` | `` | The number of votes on the issue. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueVotes](/docs/operations/issue-votes.md) | [getVotes](/docs/operations/issue-votes.md#get-votes) |

### Schema

*None*
