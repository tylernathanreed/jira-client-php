# Field Reference Data

Details of a field that can be used in advanced searches.

Source: [`Jira\Client\Schema\FieldReferenceData`](/src/Schema/FieldReferenceData.php)

| Property | Type | Description |
| --- | --- | --- |
| `auto` | `'true'\|'false'\|null` | Whether the field provide auto-complete suggestions. |
| `cfid` | `string` | If the item is a custom field, the ID of the custom field. |
| `deprecated` | `'true'\|'false'\|null` | Whether this field has been deprecated. |
| `deprecatedSearcherKey` | `string` | The searcher key of the field, only passed when the field is deprecated. |
| `displayName` | `string` | The display name contains the following:

 *  for system fields, the field name. For example, `Summary`.
 *  for collapsed custom fields, the field name followed by a hyphen and then the field name and field type. For example, `Component - Component[Dropdown]`.
 *  for other custom fields, the field name followed by a hyphen and then the custom field ID. For example, `Component - cf[10061]`. |
| `operators` | `?list<string>` | The valid search operators for the field. |
| `orderable` | `'true'\|'false'\|null` | Whether the field can be used in a query's `ORDER BY` clause. |
| `searchable` | `'true'\|'false'\|null` | Whether the content of this field can be searched. |
| `types` | `?list<string>` | The data types of items in the field. |
| `value` | `string` | The field identifier. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JQLReferenceData](/docs/schema/j-q-l-reference-data.md) |
