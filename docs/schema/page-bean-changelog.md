# Page Bean Changelog

A page of items.

Source: [`Jira\Client\Schema\PageBeanChangelog`](/src/Schema/PageBeanChangelog.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<Changelog>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getChangeLogs](/docs/operations/issues.md#get-change-logs) |

### Schema

*None*
