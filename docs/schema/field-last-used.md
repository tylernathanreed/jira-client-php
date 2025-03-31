# Field Last Used

Information about the most recent use of a field.

Source: [`Jira\Client\Schema\FieldLastUsed`](/src/Schema/FieldLastUsed.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'TRACKED'\|`<br/>`'NOT_TRACKED'\|`<br/>`'NO_INFORMATION'\|`<br/>`null` | Last used value type:<br/><br/> *  *TRACKED*: field is tracked and a last used date is available.<br/> *  *NOT\_TRACKED*: field is not tracked, last used date is not available.<br/> *  *NO\_INFORMATION*: field is tracked, but no last used date is available. |
| `value` | `string` | The date when the value of the field last changed. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [Field](/docs/schema/field.md) |
