# Issue Bean

Details about an issue.

Source: [`Jira\Client\Schema\IssueBean`](/src/Schema/IssueBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `changelog` | `PageOfChangelogs` | Details of changelogs associated with the issue. |
| `editmeta` | `IssueUpdateMetadata` | The metadata for the fields on the issue that can be amended. |
| `expand` | `string` | Expand options that include additional issue details in the response. |
| `fields` | `object` |  |
| `fieldsToInclude` | `IncludedFields` |  |
| `id` | `string` | The ID of the issue. |
| `key` | `string` | The key of the issue. |
| `names` | `object` | The ID and name of each field present on the issue. |
| `operations` | `Operations` | The operations that can be performed on the issue. |
| `properties` | `object` | Details of the issue properties identified in the request. |
| `renderedFields` | `object` | The rendered value of each field present on the issue. |
| `schema` | `object` | The schema describing each field present on the issue. |
| `self` | `string` | The URL of the issue details. |
| `transitions` | `array` | The transitions that can be performed on the issue. |
| `versionedRepresentations` | `object` | The versions of each field on the issue. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getIssue](/docs/operations/issues.md#get-issue) |

### Schema

| Group | Operation |
| --- | --- |
| [BulkIssueResults](/docs/schema/bulk-issue-results.md) |
| [SearchAndReconcileResults](/docs/schema/search-and-reconcile-results.md) |
| [SearchResults](/docs/schema/search-results.md) |
