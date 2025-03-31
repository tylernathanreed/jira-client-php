# Page Bean Resolution Json Bean

A page of items.

Source: [`Jira\Client\Schema\PageBeanResolutionJsonBean`](/src/Schema/PageBeanResolutionJsonBean.php)

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
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [searchResolutions](/docs/operations/issue-resolutions.md#search-resolutions) |

### Schema

*None*
