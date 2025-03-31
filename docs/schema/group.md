# Group


Source: [`Jira\Client\Schema\Group`](src/Schema/Group.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional group details in the response. |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. |
| `name` | `string` | The name of group. |
| `self` | `string` | The URL for these group details. |
| `users` | `PagedListUserDetailsApplicationUser` | A paginated list of the users that are members of the group. A maximum of 50 users is returned in the list, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 50 users, use`?expand=users[51:100]`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Groups](/docs/operations/groups.md) | [getGroup](/docs/operations/groups.md#get-group) |
| [Groups](/docs/operations/groups.md) | [createGroup](/docs/operations/groups.md#create-group) |
| [Groups](/docs/operations/groups.md) | [addUserToGroup](/docs/operations/groups.md#add-user-to-group) |

### Schema

*None*
