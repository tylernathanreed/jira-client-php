# Bulk Changelog Response Bean

A page of changelogs which is designed to handle multiple issues

Source: [`Jira\Client\Schema\BulkChangelogResponseBean`](/src/Schema/BulkChangelogResponseBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueChangeLogs` | `?list<IssueChangeLog>` | The list of issues changelogs. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page, this token will be null. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getBulkChangelogs](/docs/operations/issues.md#get-bulk-changelogs) |

### Schema

*None*
