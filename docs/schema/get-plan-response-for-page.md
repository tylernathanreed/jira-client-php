# Get Plan Response For Page


Source: [`Jira\Client\Schema\GetPlanResponseForPage`](/src/Schema/GetPlanResponseForPage.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The plan ID. |
| `name` | `string` | The plan name. |
| `status` | `'Active'\|'Trashed'\|'Archived'` | The plan status. This is "Active", "Trashed" or "Archived". |
| `issueSources` | [`?list<GetIssueSourceResponse>`](/docs/schema/get-issue-source-response.md) | The issue sources included in the plan. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [PageWithCursorGetPlanResponseForPage](/docs/schema/page-with-cursor-get-plan-response-for-page.md) |
