# Page Bean Dashboard

A page of items.

Source: [`Jira\Client\Schema\PageBeanDashboard`](/src/Schema/PageBeanDashboard.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Dashboard>`](/docs/schemas/dashboard.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboardsPaginated](/docs/operations/dashboards.md#get-dashboards-paginated) |

### Schema

*None*
