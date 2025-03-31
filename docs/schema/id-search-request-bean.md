# Id Search Request Bean


Source: [`Jira\Client\Schema\IdSearchRequestBean`](/src/Schema/IdSearchRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. Order by clauses are not allowed. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `nextPageToken` | `string` | The continuation token to fetch the next page. This token is provided by the response of this endpoint. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSearch](/docs/operations/issue-search.md) | [searchForIssuesIds](/docs/operations/issue-search.md#search-for-issues-ids) |

### Schema

*None*
