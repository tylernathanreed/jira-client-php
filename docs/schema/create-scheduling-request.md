# Create Scheduling Request


Source: [`Jira\Client\Schema\CreateSchedulingRequest`](src/Schema/CreateSchedulingRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `estimation` | `string` | The estimation unit for the plan. This must be "StoryPoints", "Days" or "Hours". |
| `dependencies` | `string` | The dependencies for the plan. This must be "Sequential" or "Concurrent". |
| `endDate` | `CreateDateFieldRequest` | The end date field for the plan. |
| `inferredDates` | `string` | The inferred dates for the plan. This must be "None", "SprintDates" or "ReleaseDates". |
| `startDate` | `CreateDateFieldRequest` | The start date field for the plan. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreatePlanRequest](/docs/schema/create-plan-request.md) |
