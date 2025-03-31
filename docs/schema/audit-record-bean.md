# Audit Record Bean

An audit record.

Source: [`Jira\Client\Schema\AuditRecordBean`](src/Schema/AuditRecordBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `associatedItems` | `array` | The list of items associated with the changed record. |
| `authorKey` | `string` | Deprecated, use `authorAccountId` instead. The key of the user who created the audit record. |
| `category` | `string` | The category of the audit record. For a list of these categories, see the help article [Auditing in Jira applications](https://confluence.atlassian.com/x/noXKM). |
| `changedValues` | `array` | The list of values changed in the record event. |
| `created` | `string` | The date and time on which the audit record was created. |
| `description` | `string` | The description of the audit record. |
| `eventSource` | `string` | The event the audit record originated from. |
| `id` | `int` | The ID of the audit record. |
| `objectItem` | `AssociatedItemBean` |  |
| `remoteAddress` | `string` | The URL of the computer where the creation of the audit record was initiated. |
| `summary` | `string` | The summary of the audit record. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [AuditRecords](/docs/schema/audit-records.md) |
