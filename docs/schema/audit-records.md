# Audit Records

Container for a list of audit records.

Source: [`Jira\Client\Schema\AuditRecords`](/src/Schema/AuditRecords.php)

| Property | Type | Description |
| --- | --- | --- |
| `limit` | `` | The requested or default limit on the number of audit items to be returned. |
| `offset` | `` | The number of audit items skipped before the first item in this list. |
| `records` | `?list<AuditRecordBean>` | The list of audit items. |
| `total` | `` | The total number of audit items returned. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AuditRecords](/docs/operations/audit-records.md) | [getAuditRecords](/docs/operations/audit-records.md#get-audit-records) |

### Schema

*None*
