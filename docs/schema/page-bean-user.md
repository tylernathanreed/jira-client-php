# Page Bean User

A page of items.

Source: [`Jira\Client\Schema\PageBeanUser`](/src/Schema/PageBeanUser.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<User>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Users](/docs/operations/users.md) | [bulkGetUsers](/docs/operations/users.md#bulk-get-users) |
| [UserSearch](/docs/operations/user-search.md) | [findUsersByQuery](/docs/operations/user-search.md#find-users-by-query) |

### Schema

*None*
