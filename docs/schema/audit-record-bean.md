# Audit Record Bean

An audit record.

Source: [`Jira\Client\Schema\AuditRecordBean`](/src/Schema/AuditRecordBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `associatedItems` | `?list<AssociatedItemBean>` | The list of items associated with the changed record. |
| `authorKey` | `` | Deprecated, use `authorAccountId` instead. The key of the user who created the audit record. |
| `category` | `` | The category of the audit record. For a list of these categories, see the help article [Auditing in Jira applications](https://confluence.atlassian.com/x/noXKM). |
| `changedValues` | `?list<ChangedValueBean>` | The list of values changed in the record event. |
| `created` | `` | The date and time on which the audit record was created. |
| `description` | `` | The description of the audit record. |
| `eventSource` | `` | The event the audit record originated from. |
| `id` | `` | The ID of the audit record. |
| `objectItem` | `` |  |
| `remoteAddress` | `` | The URL of the computer where the creation of the audit record was initiated. |
| `summary` | `` | The summary of the audit record. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [AuditRecords](/docs/schema/audit-records.md) |
