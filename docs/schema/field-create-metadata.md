# Field Create Metadata

The metadata describing an issue field for createmeta.

Source: [`Jira\Client\Schema\FieldCreateMetadata`](/src/Schema/FieldCreateMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The field id. |
| `key` | `string` | The key of the field. |
| `name` | `string` | The name of the field. |
| `operations` | `list<string>` | The list of operations that can be performed on the field. |
| `required` | `bool` | Whether the field is required. |
| `schema` | `JsonTypeBean` | The data type of the field. |
| `allowedValues` | `?list<mixed>` | The list of values allowed in the field. |
| `autoCompleteUrl` | `string` | The URL that can be used to automatically complete the field. |
| `configuration` | `array<string,mixed>` | The configuration properties. |
| `defaultValue` | `mixed` | The default value of the field. |
| `hasDefaultValue` | `bool` | Whether the field has a default value. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageOfCreateMetaIssueTypeWithField](/docs/schema/page-of-create-meta-issue-type-with-field.md) |
| [PaginatedResponseFieldCreateMetadata](/docs/schema/paginated-response-field-create-metadata.md) |
