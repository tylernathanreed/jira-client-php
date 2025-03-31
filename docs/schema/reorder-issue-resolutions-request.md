# Reorder Issue Resolutions Request

Change the order of issue resolutions.

Source: [`Jira\Client\Schema\ReorderIssueResolutionsRequest`](/src/Schema/ReorderIssueResolutionsRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `array` | The list of resolution IDs to be reordered. Cannot contain duplicates nor after ID. |
| `after` | `string` | The ID of the resolution. Required if `position` isn't provided. |
| `position` | `string` | The position for issue resolutions to be moved to. Required if `after` isn't provided. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [moveResolutions](/docs/operations/issue-resolutions.md#move-resolutions) |

### Schema

*None*
