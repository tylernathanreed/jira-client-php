# Page Bean Priority With Sequence

A page of items.

Source: [`Jira\Client\Schema\PageBeanPriorityWithSequence`](src/Schema/PageBeanPriorityWithSequence.php)

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
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [suggestedPrioritiesForMappings](/docs/operations/priority-schemes.md#suggested-priorities-for-mappings) |
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [getAvailablePrioritiesByPriorityScheme](/docs/operations/priority-schemes.md#get-available-priorities-by-priority-scheme) |
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [getPrioritiesByPriorityScheme](/docs/operations/priority-schemes.md#get-priorities-by-priority-scheme) |

### Schema

| Group | Operation |
| --- | --- |
| [PrioritySchemeWithPaginatedPrioritiesAndProjects](/docs/schema/priority-scheme-with-paginated-priorities-and-projects.md) |
