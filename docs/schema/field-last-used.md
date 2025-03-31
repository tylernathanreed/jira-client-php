# Field Last Used

Information about the most recent use of a field.

Source: [`Jira\Client\Schema\FieldLastUsed`](/src/Schema/FieldLastUsed.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` | Last used value type:

 *  *TRACKED*: field is tracked and a last used date is available.
 *  *NOT\_TRACKED*: field is not tracked, last used date is not available.
 *  *NO\_INFORMATION*: field is tracked, but no last used date is available. |
| `value` | `string` | The date when the value of the field last changed. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Field](/docs/schema/field.md) |
