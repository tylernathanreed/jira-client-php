# Issue Bulk Edit Field


Source: [`Jira\Client\Schema\IssueBulkEditField`](/src/Schema/IssueBulkEditField.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | Description of the field. |
| `fieldOptions` | `?list<IssueBulkOperationsFieldOption>` | A list of options related to the field, applicable in contexts where multiple selections are allowed. |
| `id` | `string` | The unique ID of the field. |
| `isRequired` | `bool` | Indicates whether the field is mandatory for the operation. |
| `multiSelectFieldOptions` | `?list<string>` | Specifies supported actions (like add, replace, remove) on multi-select fields via an enum. |
| `name` | `string` | The display name of the field. |
| `searchUrl` | `string` | A URL to fetch additional data for the field |
| `type` | `string` | The type of the field. |
| `unavailableMessage` | `string` | A message indicating why the field is unavailable for editing. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [BulkEditGetFields](/docs/schema/bulk-edit-get-fields.md) |
