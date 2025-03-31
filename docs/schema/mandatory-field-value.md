# Mandatory Field Value

List of string of inputs

Source: [`Jira\Client\Schema\MandatoryFieldValue`](/src/Schema/MandatoryFieldValue.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `list<string>` | Value for each field. Provide a `list of strings` for non-ADF fields. |
| `retain` | `` | If `true`, will try to retain original non-null issue field values on move. |
| `type` | `'adf'|'raw'|null` | Will treat as `MandatoryFieldValue` if type is `raw` or `empty` |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [fields](/docs/schema/fields.md) |
