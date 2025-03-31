# Found Group

A group found in a search.

Source: [`Jira\Client\Schema\FoundGroup`](/src/Schema/FoundGroup.php)

| Property | Type | Description |
| --- | --- | --- |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. |
| `html` | `string` | The group name with the matched query string highlighted with the HTML bold tag. |
| `labels` | `?list<GroupLabel>` |  |
| `name` | `string` | The name of the group. The name of a group is mutable, to reliably identify a group use ``groupId`.` |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [FoundGroups](/docs/schema/found-groups.md) |
