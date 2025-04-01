# Mandatory Field Value For ADF 

An object notation input

Source: [`Jira\Client\Schema\MandatoryFieldValueForADF`](/src/Schema/MandatoryFieldValueForADF.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `array<string,mixed>` | Value for each field. Accepts Atlassian Document Format (ADF) for rich text fields like `description`, `environments`. For ADF format details, refer to: [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure) |
| `type` | `'adf'\|'raw'` | Will treat as `MandatoryFieldValueForADF` if type is `adf` |
| `retain` | `bool` | If `true`, will try to retain original non-null issue field values on move. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [Fields](/docs/schema/fields.md) |
