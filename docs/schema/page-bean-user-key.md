# Page Bean User Key

A page of items.

Source: [`Jira\Client\Schema\PageBeanUserKey`](/src/Schema/PageBeanUserKey.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<UserKey>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UserSearch](/docs/operations/user-search.md) | [findUserKeysByQuery](/docs/operations/user-search.md#find-user-keys-by-query) |

### Schema

*None*
