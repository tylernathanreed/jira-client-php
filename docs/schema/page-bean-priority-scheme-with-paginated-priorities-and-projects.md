# Page Bean Priority Scheme With Paginated Priorities And Projects

A page of items.

Source: [`Jira\Client\Schema\PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects`](/src/Schema/PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<PrioritySchemeWithPaginatedPrioritiesAndProjects>`](/src/Schema/PrioritySchemeWithPaginatedPrioritiesAndProjects.php) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [getPrioritySchemes](/docs/operations/priority-schemes.md#get-priority-schemes) |

### Schema

*None*
