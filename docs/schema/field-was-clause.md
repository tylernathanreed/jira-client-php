# Field Was Clause

A clause that asserts a previous value of a field.
For example, `status WAS "Resolved" BY currentUser() BEFORE "2019/02/02"`.
See "WAS" for more information about the WAS operator.
See: https://confluence.atlassian.com/x/dgiiLQ#Advancedsearching-operatorsreference-WASWAS

Source: [`Jira\Client\Schema\FieldWasClause`](/src/Schema/FieldWasClause.php)

| Property | Type | Description |
| --- | --- | --- |
| `field` | `` |  |
| `operand` | `` |  |
| `operator` | `'was'|'was in'|'was not in'|'was not'` | The operator between the field and operand. |
| `predicates` | `list<JqlQueryClauseTimePredicate>` | The list of time predicates. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlQueryClause](/docs/schema/jql-query-clause.md) |
