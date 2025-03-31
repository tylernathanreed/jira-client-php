# Jql Query To Sanitize

The JQL query to sanitize for the account ID.
If the account ID is null, sanitizing is performed for an anonymous user.

Source: [`Jira\Client\Schema\JqlQueryToSanitize`](src/Schema/JqlQueryToSanitize.php)

| Property | Type | Description |
| --- | --- | --- |
| `query` | `string` | The query to sanitize. |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlQueriesToSanitize](/docs/schema/jql-queries-to-sanitize.md) |
