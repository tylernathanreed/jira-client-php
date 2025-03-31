# Page Bean Priority

A page of items.

Source: [`Jira\Client\Schema\PageBeanPriority`](/src/Schema/PageBeanPriority.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[Priority](/src/Schema/Priority.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [searchPriorities](/docs/operations/issue-priorities.md#search-priorities) |

### Schema

*None*
