# Search Results

The result of a JQL search.

Source: [`Jira\Client\Schema\SearchResults`](/src/Schema/SearchResults.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional search result details in the response. |
| `issues` | [`?list<IssueBean>`](/docs/schemas/issue-bean.md) | The list of issues found by the search. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `names` | `array<string,string>` | The ID and name of each field in the search results. |
| `schema` | `array<string,JsonTypeBean>` | The schema describing the field types in the search results. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |
| `warningMessages` | `?list<string>` | Any warnings related to the JQL query. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSearch](/docs/operations/issue-search.md) | [searchForIssuesUsingJql](/docs/operations/issue-search.md#search-for-issues-using-jql) |
| [IssueSearch](/docs/operations/issue-search.md) | [searchForIssuesUsingJqlPost](/docs/operations/issue-search.md#search-for-issues-using-jql-post) |

### Schema

*None*
