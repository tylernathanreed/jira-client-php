# Search And Reconcile Results

The result of a JQL search with issues reconsilation.

Source: [`Jira\Client\Schema\SearchAndReconcileResults`](/src/Schema/SearchAndReconcileResults.php)

| Property | Type | Description |
| --- | --- | --- |
| `issues` | [`?list<IssueBean>`](/docs/schema/issue-bean.md) | The list of issues found by the search or reconsiliation. |
| `names` | `array<string,string>` | The ID and name of each field in the search results. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page this token will be null. This token will expire in 7 days. |
| `schema` | [`array<string,JsonTypeBean>`](/docs/schema/json-type-bean.md) | The schema describing the field types in the search results. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSearch](/docs/operations/issue-search.md) | [searchAndReconsileIssuesUsingJql](/docs/operations/issue-search.md#search-and-reconsile-issues-using-jql) |
| [IssueSearch](/docs/operations/issue-search.md) | [searchAndReconsileIssuesUsingJqlPost](/docs/operations/issue-search.md#search-and-reconsile-issues-using-jql-post) |

### Schema

*None*
