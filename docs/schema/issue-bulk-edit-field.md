# Issue Bulk Edit Field


Source: [`Jira\Client\Schema\IssueBulkEditField`](/src/Schema/IssueBulkEditField.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `` | Description of the field. |
| `fieldOptions` | `?list<IssueBulkOperationsFieldOption>` | A list of options related to the field, applicable in contexts where multiple selections are allowed. |
| `id` | `` | The unique ID of the field. |
| `isRequired` | `` | Indicates whether the field is mandatory for the operation. |
| `multiSelectFieldOptions` | `?list<string>` | Specifies supported actions (like add, replace, remove) on multi-select fields via an enum. |
| `name` | `` | The display name of the field. |
| `searchUrl` | `` | A URL to fetch additional data for the field |
| `type` | `` | The type of the field. |
| `unavailableMessage` | `` | A message indicating why the field is unavailable for editing. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [BulkEditGetFields](/docs/schema/bulk-edit-get-fields.md) |
