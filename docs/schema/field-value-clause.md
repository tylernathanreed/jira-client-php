# Field Value Clause

A clause that asserts the current value of a field.
For example, `summary ~ test`.

Source: [`Jira\Client\Schema\FieldValueClause`](/src/Schema/FieldValueClause.php)

| Property | Type | Description |
| --- | --- | --- |
| `field` | [`JqlQueryField`](/docs/schema/jql-query-field.md) |  |
| `operand` | [`JqlQueryClauseOperand`](/docs/schema/jql-query-clause-operand.md) |  |
| `operator` | `'='\|'!='\|'>'\|'<'\|'>='\|'<='\|'in'\|'not in'\|'~'\|'~='\|'is'\|'is not'` | The operator between the field and operand. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JqlQueryClause](/docs/schema/jql-query-clause.md) |
