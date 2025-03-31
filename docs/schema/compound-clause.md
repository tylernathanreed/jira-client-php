# Compound Clause

A JQL query clause that consists of nested clauses.
For example, `(labels in (urgent, blocker) OR lastCommentedBy = currentUser()).
Note that, where nesting is not defined, the parser nests JQL clauses based on the operator precedence.
For example, "A OR B AND C" is parsed as "(A OR B) AND C".
See Setting the precedence of operators for more information about precedence in JQL queries.`

Source: [`Jira\Client\Schema\CompoundClause`](/src/Schema/CompoundClause.php)

| Property | Type | Description |
| --- | --- | --- |
| `clauses` | [`list<JqlQueryClause>`](/docs/schema/jql-query-clause.md) | The list of nested clauses. |
| `operator` | `'and'\|'or'\|'not'` | The operator between the clauses. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JqlQueryClause](/docs/schema/jql-query-clause.md) |
