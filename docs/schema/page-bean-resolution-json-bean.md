# Page Bean Resolution Json Bean

A page of items.

Source: [`Jira\Client\Schema\PageBeanResolutionJsonBean`](/src/Schema/PageBeanResolutionJsonBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<ResolutionJsonBean>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [searchResolutions](/docs/operations/issue-resolutions.md#search-resolutions) |

### Schema

*None*
