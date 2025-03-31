# Bulk Fetch Issue Request Bean


Source: [`Jira\Client\Schema\BulkFetchIssueRequestBean`](src/Schema/BulkFetchIssueRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `array` | An array of issue IDs or issue keys to fetch. You can mix issue IDs and keys in the same query. |
| `expand` | `array` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:

 *  `renderedFields` Returns field values rendered in HTML format.
 *  `names` Returns the display name of each field.
 *  `schema` Returns the schema describing a field type.
 *  `transitions` Returns all possible transitions for the issue.
 *  `operations` Returns all possible operations for the issue.
 *  `editmeta` Returns information about how each field can be edited.
 *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
 *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version. |
| `fields` | `array` | A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:

 *  `*all` Returns all fields.
 *  `*navigable` Returns navigable fields.
 *  Any issue field, prefixed with a minus to exclude.

The default is `*navigable`.

Examples:

 *  `summary,comment` Returns the summary and comments fields only.
 *  `-description` Returns all navigable (default) fields except description.
 *  `*all,-comment` Returns all fields except comments.

Multiple `fields` parameters can be included in a request.

Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `fieldsByKeys` | `bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `properties` | `array` | A list of issue property keys of issue properties to be included in the results. A maximum of 5 issue property keys can be specified. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [bulkFetchIssues](/docs/operations/issues.md#bulk-fetch-issues) |

### Schema

*None*
