# Issue Bean

Details about an issue.

Source: [`Jira\Client\Schema\IssueBean`](/src/Schema/IssueBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `changelog` | [`PageOfChangelogs`](/docs/schema/page-of-changelogs.md) | Details of changelogs associated with the issue. |
| `editmeta` | [`IssueUpdateMetadata`](/docs/schema/issue-update-metadata.md) | The metadata for the fields on the issue that can be amended. |
| `expand` | `string` | Expand options that include additional issue details in the response. |
| `fields` | `array<string,mixed>` |  |
| `fieldsToInclude` | [`IncludedFields`](/docs/schema/included-fields.md) |  |
| `id` | `string` | The ID of the issue. |
| `key` | `string` | The key of the issue. |
| `names` | `array<string,string>` | The ID and name of each field present on the issue. |
| `operations` | [`Operations`](/docs/schema/operations.md) | The operations that can be performed on the issue. |
| `properties` | `array<string,mixed>` | Details of the issue properties identified in the request. |
| `renderedFields` | `array<string,mixed>` | The rendered value of each field present on the issue. |
| `schema` | `array<string,JsonTypeBean>` | The schema describing each field present on the issue. |
| `self` | `string` | The URL of the issue details. |
| `transitions` | [`?list<IssueTransition>`](/docs/schema/issue-transition.md) | The transitions that can be performed on the issue. |
| `versionedRepresentations` | `array<string,object>` | The versions of each field on the issue. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getIssue](/docs/operations/issues.md#get-issue) |

### Schema

| Schema |
| --- |
| [BulkIssueResults](/docs/schema/bulk-issue-results.md) |
| [SearchAndReconcileResults](/docs/schema/search-and-reconcile-results.md) |
| [SearchResults](/docs/schema/search-results.md) |
