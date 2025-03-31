# Sanitized Jql Query

Details of the sanitized JQL query.

Source: [`Jira\Client\Schema\SanitizedJqlQuery`](/src/Schema/SanitizedJqlQuery.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user for whom sanitization was performed. |
| `errors` | `ErrorCollection` | The list of errors. |
| `initialQuery` | `string` | The initial query. |
| `sanitizedQuery` | `string` | The sanitized query, if there were no errors. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [SanitizedJqlQueries](/docs/schema/sanitized-jql-queries.md) |
