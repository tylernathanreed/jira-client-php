# Archived Issues Filter Request

Details of a filter for exporting archived issues.

Source: [`Jira\Client\Schema\ArchivedIssuesFilterRequest`](/src/Schema/ArchivedIssuesFilterRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `archivedBy` | `array` | List archived issues archived by a specified account ID. |
| `archivedDateRange` | `DateRangeFilterRequest` |  |
| `issueTypes` | `array` | List archived issues with a specified issue type ID. |
| `projects` | `array` | List archived issues with a specified project key. |
| `reporters` | `array` | List archived issues where the reporter is a specified account ID. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [exportArchivedIssues](/docs/operations/issues.md#export-archived-issues) |

### Schema

*None*
