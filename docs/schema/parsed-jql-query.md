# Parsed Jql Query

Details of a parsed JQL query.

Source: [`Jira\Client\Schema\ParsedJqlQuery`](src/Schema/ParsedJqlQuery.php)

| Property | Type | Description |
| --- | --- | --- |
| `query` | `string` | The JQL query that was parsed and validated. |
| `errors` | `array` | The list of syntax or validation errors. |
| `structure` | `JqlQuery` | The syntax tree of the query. Empty if the query was invalid. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ParsedJqlQueries](/docs/schema/parsed-jql-queries.md) |
