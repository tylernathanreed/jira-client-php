# Bulk Permission Grants

Details of global and project permissions granted to the user.

Source: [`Jira\Client\Schema\BulkPermissionGrants`](/src/Schema/BulkPermissionGrants.php)

| Property | Type | Description |
| --- | --- | --- |
| `globalPermissions` | `list<string>` | List of permissions granted to the user. |
| `projectPermissions` | `list<[BulkProjectPermissionGrants](/src/Schema/BulkProjectPermissionGrants.php)>` | List of project permissions and the projects and issues those permissions provide access to. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Permissions](/docs/operations/permissions.md) | [getBulkPermissions](/docs/operations/permissions.md#get-bulk-permissions) |

### Schema

*None*
