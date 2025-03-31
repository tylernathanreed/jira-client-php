# Field Value Clause

A clause that asserts the current value of a field.
For example, `summary ~ test`.

Source: [`Jira\Client\Schema\FieldValueClause`](/src/Schema/FieldValueClause.php)

| Property | Type | Description |
| --- | --- | --- |
| `field` | `JqlQueryField` |  |
| `operand` | `JqlQueryClauseOperand` |  |
| `operator` | `'='\|'!='\|'>'\|'<'\|'>='\|'<='\|'in'\|'not in'\|'~'\|'~='\|'is'\|'is not'` | The operator between the field and operand. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlQueryClause](/docs/schema/jql-query-clause.md) |
