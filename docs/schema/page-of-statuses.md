# Page Of Statuses


Source: [`Jira\Client\Schema\PageOfStatuses`](/src/Schema/PageOfStatuses.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | The URL of the next page of results, if any. |
| `self` | `string` | The URL of this page. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | Number of items that satisfy the search. |
| `values` | [`?list<JiraStatus>`](/src/Schema/JiraStatus.php) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Status](/docs/operations/status.md) | [search](/docs/operations/status.md#search) |

### Schema

*None*
