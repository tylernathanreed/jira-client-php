# Converted JQL Queries

The converted JQL queries.

Source: [`Jira\Client\Schema\ConvertedJQLQueries`](/src/Schema/ConvertedJQLQueries.php)

| Property | Type | Description |
| --- | --- | --- |
| `queriesWithUnknownUsers` | [`?list<JQLQueryWithUnknownUsers>`](/docs/schema/jql-query-with-unknown-users.md) | List of queries containing user information that could not be mapped to an existing user |
| `queryStrings` | `?list<string>` | The list of converted query strings with account IDs in place of user identifiers. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JQL](/docs/operations/jql.md) | [migrateQueries](/docs/operations/jql.md#migrate-queries) |

### Schema

*None*
