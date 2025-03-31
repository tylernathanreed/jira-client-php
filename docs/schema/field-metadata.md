# Field Metadata

The metadata describing an issue field.

Source: [`Jira\Client\Schema\FieldMetadata`](/src/Schema/FieldMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `key` | `` | The key of the field. |
| `name` | `` | The name of the field. |
| `operations` | `list<string>` | The list of operations that can be performed on the field. |
| `required` | `` | Whether the field is required. |
| `schema` | `` | The data type of the field. |
| `allowedValues` | `?list<mixed>` | The list of values allowed in the field. |
| `autoCompleteUrl` | `` | The URL that can be used to automatically complete the field. |
| `configuration` | `array<string,mixed>` | The configuration properties. |
| `defaultValue` | `` | The default value of the field. |
| `hasDefaultValue` | `` | Whether the field has a default value. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueTransition](/docs/schema/issue-transition.md) |
| [IssueTypeIssueCreateMetadata](/docs/schema/issue-type-issue-create-metadata.md) |
| [IssueUpdateMetadata](/docs/schema/issue-update-metadata.md) |
