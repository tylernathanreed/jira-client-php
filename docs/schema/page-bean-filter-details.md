# Page Bean Filter Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanFilterDetails`](src/Schema/PageBeanFilterDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `array` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Filters](/docs/operations/filters.md) | [getFiltersPaginated](/docs/operations/filters.md#get-filters-paginated) |

### Schema

*None*
