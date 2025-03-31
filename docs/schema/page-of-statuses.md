# Page Of Statuses


Source: [`Jira\Client\Schema\PageOfStatuses`](/src/Schema/PageOfStatuses.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | The URL of the next page of results, if any. |
| `self` | `` | The URL of this page. |
| `startAt` | `` | The index of the first item returned on the page. |
| `total` | `` | Number of items that satisfy the search. |
| `values` | `?list<JiraStatus>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Status](/docs/operations/status.md) | [search](/docs/operations/status.md#search) |

### Schema

*None*
