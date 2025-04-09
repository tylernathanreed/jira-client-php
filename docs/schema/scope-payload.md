# Scope Payload

The payload for creating a scope.
Defines if a project is team-managed project or company-managed project

Source: [`Jira\Client\Schema\ScopePayload`](/src/Schema/ScopePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'GLOBAL'\|'PROJECT'\|null` | The type of the scope. Use `GLOBAL` or empty for company-managed project, and `PROJECT` for team-managed project |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
