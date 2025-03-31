# Paged List User Details Application User

A paged list.
To access additional details append `[start-index:end-index]` to the expand request.
For example, `?expand=sharedUsers[10:40]` returns a list starting at item 10 and finishing at item 40.

Source: [`Jira\Client\Schema\PagedListUserDetailsApplicationUser`](/src/Schema/PagedListUserDetailsApplicationUser.php)

| Property | Type | Description |
| --- | --- | --- |
| `end-index` | `` | The index of the last item returned on the page. |
| `items` | `?list<UserDetails>` | The list of items. |
| `max-results` | `` | The maximum number of results that could be on the page. |
| `size` | `` | The number of items on the page. |
| `start-index` | `` | The index of the first item returned on the page. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Group](/docs/schema/group.md) |
