# Page Bean Component With Issue Count

A page of items.

Source: [`Jira\Client\Schema\PageBeanComponentWithIssueCount`](/src/Schema/PageBeanComponentWithIssueCount.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ComponentWithIssueCount>`](/docs/schemas/component-with-issue-count.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectComponents](/docs/operations/project-components.md) | [getProjectComponentsPaginated](/docs/operations/project-components.md#get-project-components-paginated) |

### Schema

*None*
