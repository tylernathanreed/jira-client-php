# Field Reference Data

Details of a field that can be used in advanced searches.

Source: [`Jira\Client\Schema\FieldReferenceData`](/src/Schema/FieldReferenceData.php)

| Property | Type | Description |
| --- | --- | --- |
| `auto` | `string` | Whether the field provide auto-complete suggestions. |
| `cfid` | `string` | If the item is a custom field, the ID of the custom field. |
| `deprecated` | `string` | Whether this field has been deprecated. |
| `deprecatedSearcherKey` | `string` | The searcher key of the field, only passed when the field is deprecated. |
| `displayName` | `string` | The display name contains the following:

 *  for system fields, the field name. For example, `Summary`.
 *  for collapsed custom fields, the field name followed by a hyphen and then the field name and field type. For example, `Component - Component[Dropdown]`.
 *  for other custom fields, the field name followed by a hyphen and then the custom field ID. For example, `Component - cf[10061]`. |
| `operators` | `array` | The valid search operators for the field. |
| `orderable` | `string` | Whether the field can be used in a query's `ORDER BY` clause. |
| `searchable` | `string` | Whether the content of this field can be searched. |
| `types` | `array` | The data types of items in the field. |
| `value` | `string` | The field identifier. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JQLReferenceData](/docs/schema/j-q-l-reference-data.md) |
