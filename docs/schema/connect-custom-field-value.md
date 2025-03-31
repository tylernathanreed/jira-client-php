# Connect Custom Field Value

A list of custom field details.

Source: [`Jira\Client\Schema\ConnectCustomFieldValue`](/src/Schema/ConnectCustomFieldValue.php)

| Property | Type | Description |
| --- | --- | --- |
| `_type` | `'StringIssueField'\|'NumberIssueField'\|'RichTextIssueField'\|'SingleSelectIssueField'\|'MultiSelectIssueField'\|'TextIssueField'` | The type of custom field. |
| `fieldID` | `int` | The custom field ID. |
| `issueID` | `int` | The issue ID. |
| `number` | `float` | The value of number type custom field when `_type` is `NumberIssueField`. |
| `optionID` | `string` | The value of single select and multiselect custom field type when `_type` is `SingleSelectIssueField` or `MultiSelectIssueField`. |
| `richText` | `string` | The value of richText type custom field when `_type` is `RichTextIssueField`. |
| `string` | `string` | The value of string type custom field when `_type` is `StringIssueField`. |
| `text` | `string` | The value of of text custom field type when `_type` is `TextIssueField`. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ConnectCustomFieldValues](/docs/schema/connect-custom-field-values.md) |
