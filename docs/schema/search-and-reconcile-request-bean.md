# Search And Reconcile Request Bean


Source: [`Jira\Client\Schema\SearchAndReconcileRequestBean`](/src/Schema/SearchAndReconcileRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a comma-delimited string of values. The expand options are:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.<br/><br/>Examples: `"names,changelog"` Returns the display name of each field as well as a list of recent updates to an issue. |
| `fields` | `?list<string>` | A list of fields to return for each issue. Use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  `id` Returns only issue IDs.<br/> *  Any issue field, prefixed with a dash to exclude.<br/><br/>The default is `id`.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns the summary and comments fields only.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>Multiple `fields` parameters can be included in a request.<br/><br/>Note: By default, this resource returns IDs only. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `fieldsByKeys` | `bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. For performance reasons, this parameter requires a bounded query. A bounded query is a query with a search restriction.<br/><br/> *  Example of an unbounded query: `order by key desc`.<br/> *  Example of a bounded query: `assignee = currentUser() order by key`.<br/><br/>Additionally, `orderBy` clause can contain a maximum of 7 fields. |
| `maxResults` | `int` | The maximum number of items to return per page. To manage page size, API may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only. It returns max 5000 issues. |
| `nextPageToken` | `string` | The token for a page to fetch that is not the first page. The first page has a `nextPageToken` of `null`. Use the `nextPageToken` to fetch the next page of issues. |
| `properties` | `?list<string>` | A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list. |
| `reconcileIssues` | `?list<int>` | Strong consistency issue ids to be reconciled with search results. Accepts max 50 ids |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSearch](/docs/operations/issue-search.md) | [searchAndReconsileIssuesUsingJqlPost](/docs/operations/issue-search.md#search-and-reconsile-issues-using-jql-post) |

### Schema

*None*
