# Page Bean Filter Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanFilterDetails`](/src/Schema/PageBeanFilterDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<FilterDetails>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Filters](/docs/operations/filters.md) | [getFiltersPaginated](/docs/operations/filters.md#get-filters-paginated) |

### Schema

*None*
