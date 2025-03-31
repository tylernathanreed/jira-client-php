# Audit Records

Container for a list of audit records.

Source: [`Jira\Client\Schema\AuditRecords`](src/Schema/AuditRecords.php)

| Property | Type | Description |
| --- | --- | --- |
| `limit` | `int` | The requested or default limit on the number of audit items to be returned. |
| `offset` | `int` | The number of audit items skipped before the first item in this list. |
| `records` | `array` | The list of audit items. |
| `total` | `int` | The total number of audit items returned. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AuditRecords](/docs/operations/audit-records.md) | [getAuditRecords](/docs/operations/audit-records.md#get-audit-records) |

### Schema

*None*
