# Bulk Project Permission Grants

List of project permissions and the projects and issues those permissions grant access to.

Source: [`Jira\Client\Schema\BulkProjectPermissionGrants`](/src/Schema/BulkProjectPermissionGrants.php)

| Property | Type | Description |
| --- | --- | --- |
| `issues` | `list<int>` | IDs of the issues the user has the permission for. |
| `permission` | `string` | A project permission, |
| `projects` | `list<int>` | IDs of the projects the user has the permission for. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [BulkPermissionGrants](/docs/schema/bulk-permission-grants.md) |
