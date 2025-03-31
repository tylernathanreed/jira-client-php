# Bulk Edit Shareable Entity Response

Details of a request to bulk edit shareable entity.

Source: [`Jira\Client\Schema\BulkEditShareableEntityResponse`](/src/Schema/BulkEditShareableEntityResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `action` | `'changeOwner'\|'changePermission'\|'addPermission'\|'removePermission'` | Allowed action for bulk edit shareable entity |
| `entityErrors` | `array<string,BulkEditActionError>` | The mapping dashboard id to errors if any. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [bulkEditDashboards](/docs/operations/dashboards.md#bulk-edit-dashboards) |

### Schema

*None*
