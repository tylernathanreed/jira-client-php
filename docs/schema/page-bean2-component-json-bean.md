# Page Bean2 Component Json Bean

A page of items.

Source: [`Jira\Client\Schema\PageBean2ComponentJsonBean`](/src/Schema/PageBean2ComponentJsonBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[ComponentJsonBean](/src/Schema/ComponentJsonBean.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectComponents](/docs/operations/project-components.md) | [findComponentsForProjects](/docs/operations/project-components.md#find-components-for-projects) |

### Schema

*None*
