# Page Bean Changelog

A page of items.

Source: [`Jira\Client\Schema\PageBeanChangelog`](/src/Schema/PageBeanChangelog.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<Changelog>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getChangeLogs](/docs/operations/issues.md#get-change-logs) |

### Schema

*None*
