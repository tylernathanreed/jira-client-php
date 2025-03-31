# Bulk Permissions Request Bean

Details of global permissions to look up and project permissions with associated projects and issues to look up.

Source: [`Jira\Client\Schema\BulkPermissionsRequestBean`](src/Schema/BulkPermissionsRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of a user. |
| `globalPermissions` | `array` | Global permissions to look up. |
| `projectPermissions` | `array` | Project permissions with associated projects and issues to look up. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Permissions](/docs/operations/permissions.md) | [getBulkPermissions](/docs/operations/permissions.md#get-bulk-permissions) |

### Schema

*None*
