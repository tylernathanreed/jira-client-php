# Mandatory Field Value

List of string of inputs

Source: [`Jira\Client\Schema\MandatoryFieldValue`](/src/Schema/MandatoryFieldValue.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `array` | Value for each field. Provide a `list of strings` for non-ADF fields. |
| `retain` | `bool` | If `true`, will try to retain original non-null issue field values on move. |
| `type` | `string` | Will treat as `MandatoryFieldValue` if type is `raw` or `empty` |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [fields](/docs/schema/fields.md) |
