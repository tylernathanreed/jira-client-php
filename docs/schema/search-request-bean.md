# Search Request Bean


Source: [`Jira\Client\Schema\SearchRequestBean`](/src/Schema/SearchRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?list<string>` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version. |
| `fields` | `?list<string>` | A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  Any issue field, prefixed with a minus to exclude.<br/><br/>The default is `*navigable`.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns the summary and comments fields only.<br/> *  `-description` Returns all navigable (default) fields except description.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>Multiple `fields` parameters can be included in a request.<br/><br/>Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `fieldsByKeys` | `bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `properties` | `?list<string>` | A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list. |
| `startAt` | `int` | The index of the first item to return in the page of results (page offset). The base index is `0`. |
| `validateQuery` | `'strict'\|`<br/>`'warn'\|`<br/>`'none'\|`<br/>`'true'\|`<br/>`'false'\|`<br/>`null` | Determines how to validate the JQL query and treat the validation results. Supported values:<br/><br/> *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).<br/> *  `warn` Returns all errors as warnings.<br/> *  `none` No validation is performed.<br/> *  `true` *Deprecated* A legacy synonym for `strict`.<br/> *  `false` *Deprecated* A legacy synonym for `warn`.<br/><br/>The default is `strict`.<br/><br/>Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSearch](/docs/operations/issue-search.md) | [searchForIssuesUsingJqlPost](/docs/operations/issue-search.md#search-for-issues-using-jql-post) |

### Schema

*None*
