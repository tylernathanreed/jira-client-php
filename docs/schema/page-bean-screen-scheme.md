# Page Bean Screen Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanScreenScheme`](/src/Schema/PageBeanScreenScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ScreenScheme>`](/docs/schema/screen-scheme.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ScreenSchemes](/docs/operations/screen-schemes.md) | [getScreenSchemes](/docs/operations/screen-schemes.md#get-screen-schemes) |

### Schema

*None*
