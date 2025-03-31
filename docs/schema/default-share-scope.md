# Default Share Scope

Details of the scope of the default sharing for new filters and dashboards.

Source: [`Jira\Client\Schema\DefaultShareScope`](/src/Schema/DefaultShareScope.php)

| Property | Type | Description |
| --- | --- | --- |
| `scope` | `string` | The scope of the default sharing for new filters and dashboards:

 *  `AUTHENTICATED` Shared with all logged-in users.
 *  `GLOBAL` Shared with all logged-in users. This shows as `AUTHENTICATED` in the response.
 *  `PRIVATE` Not shared with any users. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [FilterSharing](/docs/operations/filter-sharing.md) | [getDefaultShareScope](/docs/operations/filter-sharing.md#get-default-share-scope) |
| [FilterSharing](/docs/operations/filter-sharing.md) | [setDefaultShareScope](/docs/operations/filter-sharing.md#set-default-share-scope) |

### Schema

*None*
