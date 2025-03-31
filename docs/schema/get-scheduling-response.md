# Get Scheduling Response


Source: [`Jira\Client\Schema\GetSchedulingResponse`](src/Schema/GetSchedulingResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `dependencies` | `string` | The dependencies for the plan. This is "Sequential" or "Concurrent". |
| `endDate` | `GetDateFieldResponse` | The end date field for the plan. |
| `estimation` | `string` | The estimation unit for the plan. This is "StoryPoints", "Days" or "Hours". |
| `inferredDates` | `string` | The inferred dates for the plan. This is "None", "SprintDates" or "ReleaseDates". |
| `startDate` | `GetDateFieldResponse` | The start date field for the plan. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [GetPlanResponse](/docs/schema/get-plan-response.md) |
