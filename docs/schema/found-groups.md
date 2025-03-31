# Found Groups

The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.

Source: [`Jira\Client\Schema\FoundGroups`](/src/Schema/FoundGroups.php)

| Property | Type | Description |
| --- | --- | --- |
| `groups` | [`?list<FoundGroup>`](/src/Schema/FoundGroup.php) |  |
| `header` | `string` | Header text indicating the number of groups in the response and the total number of groups found in the search. |
| `total` | `int` | The total number of groups found in the search. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Groups](/docs/operations/groups.md) | [findGroups](/docs/operations/groups.md#find-groups) |

### Schema

| Group | Operation |
| --- | --- |
| [FoundUsersAndGroups](/docs/schema/found-users-and-groups.md) |
