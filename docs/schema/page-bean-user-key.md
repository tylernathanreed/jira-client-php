# Page Bean User Key

A page of items.

Source: [`Jira\Client\Schema\PageBeanUserKey`](/src/Schema/PageBeanUserKey.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<UserKey>`](/docs/schema/user-key.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UserSearch](/docs/operations/user-search.md) | [findUserKeysByQuery](/docs/operations/user-search.md#find-user-keys-by-query) |

### Schema

*None*
