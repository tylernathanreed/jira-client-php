# Page Bean Screen Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanScreenScheme`](/src/Schema/PageBeanScreenScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<ScreenScheme>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ScreenSchemes](/docs/operations/screen-schemes.md) | [getScreenSchemes](/docs/operations/screen-schemes.md#get-screen-schemes) |

### Schema

*None*
