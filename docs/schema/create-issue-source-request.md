# Create Issue Source Request


Source: [`Jira\Client\Schema\CreateIssueSourceRequest`](/src/Schema/CreateIssueSourceRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'Board'|'Project'|'Filter'` | The issue source type. This must be "Board", "Project" or "Filter". |
| `value` | `` | The issue source value. This must be a board ID if the type is "Board", a project ID if the type is "Project" or a filter ID if the type is "Filter". |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreatePlanRequest](/docs/schema/create-plan-request.md) |
