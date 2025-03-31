# Bulk Edit Shareable Entity Request

Details of a request to bulk edit shareable entity.

Source: [`Jira\Client\Schema\BulkEditShareableEntityRequest`](/src/Schema/BulkEditShareableEntityRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `action` | `'changeOwner'|'changePermission'|'addPermission'|'removePermission'` | Allowed action for bulk edit shareable entity |
| `entityIds` | `list<int>` | The id list of shareable entities to be changed. |
| `changeOwnerDetails` | `` | The details of change owner action. |
| `extendAdminPermissions` | `` | Whether the actions are executed by users with Administer Jira global permission. |
| `permissionDetails` | `` | The permission details to be changed. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [bulkEditDashboards](/docs/operations/dashboards.md#bulk-edit-dashboards) |

### Schema

*None*
