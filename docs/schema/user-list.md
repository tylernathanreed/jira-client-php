# User List

A paginated list of users sharing the filter.
This includes users that are members of the groups or can browse the projects that the filter is shared with.

Source: [`Jira\Client\Schema\UserList`](/src/Schema/UserList.php)

| Property | Type | Description |
| --- | --- | --- |
| `end-index` | `` | The index of the last item returned on the page. |
| `items` | `?list<User>` | The list of items. |
| `max-results` | `` | The maximum number of results that could be on the page. |
| `size` | `` | The number of items on the page. |
| `start-index` | `` | The index of the first item returned on the page. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Filter](/docs/schema/filter.md) |
