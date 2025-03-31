# Get Issue Source Response


Source: [`Jira\Client\Schema\GetIssueSourceResponse`](/src/Schema/GetIssueSourceResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'Board'|'Project'|'Filter'|'Custom'` | The issue source type. This is "Board", "Project" or "Filter". |
| `value` | `` | The issue source value. This is a board ID if the type is "Board", a project ID if the type is "Project" or a filter ID if the type is "Filter". |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [GetPlanResponse](/docs/schema/get-plan-response.md) |
| [GetPlanResponseForPage](/docs/schema/get-plan-response-for-page.md) |
