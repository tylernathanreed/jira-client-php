# Create Permission Holder Request


Source: [`Jira\Client\Schema\CreatePermissionHolderRequest`](src/Schema/CreatePermissionHolderRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` | The permission holder type. This must be "Group" or "AccountId". |
| `value` | `string` | The permission holder value. This must be a group name if the type is "Group" or an account ID if the type is "AccountId". |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreatePermissionRequest](/docs/schema/create-permission-request.md) |
