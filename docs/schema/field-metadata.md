# Field Metadata

The metadata describing an issue field.

Source: [`Jira\Client\Schema\FieldMetadata`](/src/Schema/FieldMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the field. |
| `name` | `string` | The name of the field. |
| `operations` | `list<string>` | The list of operations that can be performed on the field. |
| `required` | `bool` | Whether the field is required. |
| `schema` | [`JsonTypeBean`](/docs/schema/json-type-bean.md) | The data type of the field. |
| `allowedValues` | `?list<mixed>` | The list of values allowed in the field. |
| `autoCompleteUrl` | `string` | The URL that can be used to automatically complete the field. |
| `configuration` | `array<string,mixed>` | The configuration properties. |
| `defaultValue` | `mixed` | The default value of the field. |
| `hasDefaultValue` | `bool` | Whether the field has a default value. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueTransition](/docs/schema/issue-transition.md) |
| [IssueTypeIssueCreateMetadata](/docs/schema/issue-type-issue-create-metadata.md) |
| [IssueUpdateMetadata](/docs/schema/issue-update-metadata.md) |
