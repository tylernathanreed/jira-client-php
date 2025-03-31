# Page Bean User

A page of items.

Source: [`Jira\Client\Schema\PageBeanUser`](src/Schema/PageBeanUser.php)

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
| [Users](/docs/operations/users.md) | [bulkGetUsers](/docs/operations/users.md#bulk-get-users) |
| [UserSearch](/docs/operations/user-search.md) | [findUsersByQuery](/docs/operations/user-search.md#find-users-by-query) |

### Schema

*None*
