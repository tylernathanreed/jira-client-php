# Jql Query Field Entity Property

Details of an entity property.

Source: [`Jira\Client\Schema\JqlQueryFieldEntityProperty`](/src/Schema/JqlQueryFieldEntityProperty.php)

| Property | Type | Description |
| --- | --- | --- |
| `entity` | `string` | The object on which the property is set. |
| `key` | `string` | The key of the property. |
| `path` | `string` | The path in the property value to query. |
| `type` | `'number'\|`<br/>`'string'\|`<br/>`'text'\|`<br/>`'date'\|`<br/>`'user'\|`<br/>`null` | The type of the property value extraction. Not available if the extraction for the property is not registered on the instance with the [Entity property](https://developer.atlassian.com/cloud/jira/platform/modules/entity-property/) module. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JqlQueryField](/docs/schema/jql-query-field.md) |
