# Paged List User Details Application User

A paged list.
To access additional details append `[start-index:end-index]` to the expand request.
For example, `?expand=sharedUsers[10:40]` returns a list starting at item 10 and finishing at item 40.

Source: [`Jira\Client\Schema\PagedListUserDetailsApplicationUser`](/src/Schema/PagedListUserDetailsApplicationUser.php)

| Property | Type | Description |
| --- | --- | --- |
| `end-index` | `int` | The index of the last item returned on the page. |
| `items` | `?list<[UserDetails](/src/Schema/UserDetails.php)>` | The list of items. |
| `max-results` | `int` | The maximum number of results that could be on the page. |
| `size` | `int` | The number of items on the page. |
| `start-index` | `int` | The index of the first item returned on the page. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Group](/docs/schema/group.md) |
