# Found Users

The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.

Source: [`Jira\Client\Schema\FoundUsers`](/src/Schema/FoundUsers.php)

| Property | Type | Description |
| --- | --- | --- |
| `header` | `string` | Header text indicating the number of users in the response and the total number of users found in the search. |
| `total` | `int` | The total number of users found in the search. |
| `users` | [`?list<UserPickerUser>`](/docs/schema/user-picker-user.md) |  |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UserSearch](/docs/operations/user-search.md) | [findUsersForPicker](/docs/operations/user-search.md#find-users-for-picker) |

### Schema

| Group | Operation |
| --- | --- |
| [FoundUsersAndGroups](/docs/schema/found-users-and-groups.md) |
