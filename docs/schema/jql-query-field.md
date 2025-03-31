# Jql Query Field

A field used in a JQL query.
See "Advanced searching - fields reference" for more information about fields in JQL queries.
See: https://confluence.atlassian.com/x/dAiiLQ

Source: [`Jira\Client\Schema\JqlQueryField`](/src/Schema/JqlQueryField.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the field. |
| `encodedName` | `string` | The encoded name of the field, which can be used directly in a JQL query. |
| `property` | [`?list<JqlQueryFieldEntityProperty>`](/docs/schema/jql-query-field-entity-property.md) | When the field refers to a value in an entity property, details of the entity property value. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldChangedClause](/docs/schema/field-changed-clause.md) |
| [FieldValueClause](/docs/schema/field-value-clause.md) |
| [FieldWasClause](/docs/schema/field-was-clause.md) |
| [JqlQueryOrderByClauseElement](/docs/schema/jql-query-order-by-clause-element.md) |
