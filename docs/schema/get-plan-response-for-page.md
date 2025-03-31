# Get Plan Response For Page


Source: [`Jira\Client\Schema\GetPlanResponseForPage`](/src/Schema/GetPlanResponseForPage.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `` | The plan ID. |
| `name` | `` | The plan name. |
| `status` | `'Active'|'Trashed'|'Archived'` | The plan status. This is "Active", "Trashed" or "Archived". |
| `issueSources` | `?list<GetIssueSourceResponse>` | The issue sources included in the plan. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageWithCursorGetPlanResponseForPage](/docs/schema/page-with-cursor-get-plan-response-for-page.md) |
