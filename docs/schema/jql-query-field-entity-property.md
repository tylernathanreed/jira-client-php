# Jql Query Field Entity Property

Details of an entity property.

Source: [`Jira\Client\Schema\JqlQueryFieldEntityProperty`](/src/Schema/JqlQueryFieldEntityProperty.php)

| Property | Type | Description |
| --- | --- | --- |
| `entity` | `` | The object on which the property is set. |
| `key` | `` | The key of the property. |
| `path` | `` | The path in the property value to query. |
| `type` | `'number'|'string'|'text'|'date'|'user'|null` | The type of the property value extraction. Not available if the extraction for the property is not registered on the instance with the [Entity property](https://developer.atlassian.com/cloud/jira/platform/modules/entity-property/) module. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlQueryField](/docs/schema/jql-query-field.md) |
