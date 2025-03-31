# User Permission

Details of a permission and its availability to a user.

Source: [`Jira\Client\Schema\UserPermission`](/src/Schema/UserPermission.php)

| Property | Type | Description |
| --- | --- | --- |
| `deprecatedKey` | `bool` | Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.` |
| `description` | `string` | The description of the permission. |
| `havePermission` | `bool` | Whether the permission is available to the user in the queried context. |
| `id` | `string` | The ID of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions. |
| `key` | `string` | The key of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions. |
| `name` | `string` | The name of the permission. |
| `type` | `string` | The type of the permission. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Permissions](/docs/schema/permissions.md) |
