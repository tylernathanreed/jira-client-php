# Bulk Changelog Request Bean

Request bean for bulk changelog retrieval

Source: [`Jira\Client\Schema\BulkChangelogRequestBean`](/src/Schema/BulkChangelogRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `list<string>` | List of issue IDs/keys to fetch changelogs for |
| `fieldIds` | `?list<string>` | List of field IDs to filter changelogs |
| `maxResults` | `int` | The maximum number of items to return per page |
| `nextPageToken` | `string` | The cursor for pagination |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getBulkChangelogs](/docs/operations/issues.md#get-bulk-changelogs) |

### Schema

*None*
