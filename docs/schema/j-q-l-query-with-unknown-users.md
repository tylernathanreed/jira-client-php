# J Q L Query With Unknown Users

JQL queries that contained users that could not be found

Source: [`Jira\Client\Schema\JQLQueryWithUnknownUsers`](/src/Schema/JQLQueryWithUnknownUsers.php)

| Property | Type | Description |
| --- | --- | --- |
| `convertedQuery` | `string` | The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found |
| `originalQuery` | `string` | The original query, for reference |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ConvertedJQLQueries](/docs/schema/converted-j-q-l-queries.md) |
