# Id Search Results

Result of your JQL search.
Returns a list of issue IDs and a token to fetch the next page if one exists.

Source: [`Jira\Client\Schema\IdSearchResults`](/src/Schema/IdSearchResults.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `?list<int>` | The list of issue IDs found by the search. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page this token will be null. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSearch](/docs/operations/issue-search.md) | [searchForIssuesIds](/docs/operations/issue-search.md#search-for-issues-ids) |

### Schema

*None*
