# Field Changed Clause

A clause that asserts whether a field was changed.
For example, `status CHANGED AFTER startOfMonth(-1M)`.See "CHANGED" for more information about the CHANGED operator.
See: https://confluence.atlassian.com/x/dgiiLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED

Source: [`Jira\Client\Schema\FieldChangedClause`](/src/Schema/FieldChangedClause.php)

| Property | Type | Description |
| --- | --- | --- |
| `field` | `JqlQueryField` |  |
| `operator` | `'changed'` | The operator applied to the field. |
| `predicates` | [`list<JqlQueryClauseTimePredicate>`](/docs/schema/jql-query-clause-time-predicate.md) | The list of time predicates. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlQueryClause](/docs/schema/jql-query-clause.md) |
