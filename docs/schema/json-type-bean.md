# Json Type Bean

The schema of a field.

Source: [`Jira\Client\Schema\JsonTypeBean`](/src/Schema/JsonTypeBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` | The data type of the field. |
| `configuration` | `array<string,mixed>` | If the field is a custom field, the configuration of the field. |
| `custom` | `string` | If the field is a custom field, the URI of the field. |
| `customId` | `int` | If the field is a custom field, the custom ID of the field. |
| `items` | `string` | When the data type is an array, the name of the field items within the array. |
| `system` | `string` | If the field is a system field, the name of the field. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [Field](/docs/schema/field.md) |
| [FieldCreateMetadata](/docs/schema/field-create-metadata.md) |
| [FieldDetails](/docs/schema/field-details.md) |
| [FieldMetadata](/docs/schema/field-metadata.md) |
| [IssueBean](/docs/schema/issue-bean.md) |
| [SearchAndReconcileResults](/docs/schema/search-and-reconcile-results.md) |
| [SearchResults](/docs/schema/search-results.md) |
