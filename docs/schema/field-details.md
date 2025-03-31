# Field Details

Details about a field.

Source: [`Jira\Client\Schema\FieldDetails`](/src/Schema/FieldDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `clauseNames` | `?list<string>` | The names that can be used to reference the field in an advanced search. For more information, see [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ). |
| `custom` | `bool` | Whether the field is a custom field. |
| `id` | `string` | The ID of the field. |
| `key` | `string` | The key of the field. |
| `name` | `string` | The name of the field. |
| `navigable` | `bool` | Whether the field can be used as a column on the issue navigator. |
| `orderable` | `bool` | Whether the content of the field can be used to order lists. |
| `schema` | [`JsonTypeBean`](/docs/schema/json-type-bean.md) | The data schema for the field. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the field. |
| `searchable` | `bool` | Whether the content of the field can be searched. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFields](/docs/operations/issue-fields.md) | [getFields](/docs/operations/issue-fields.md#get-fields) |
| [IssueFields](/docs/operations/issue-fields.md) | [createCustomField](/docs/operations/issue-fields.md#create-custom-field) |

### Schema

| Schema |
| --- |
| [EventNotification](/docs/schema/event-notification.md) |
