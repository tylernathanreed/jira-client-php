# Create Scheduling Request


Source: [`Jira\Client\Schema\CreateSchedulingRequest`](/src/Schema/CreateSchedulingRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `estimation` | `'StoryPoints'\|'Days'\|'Hours'` | The estimation unit for the plan. This must be "StoryPoints", "Days" or "Hours". |
| `dependencies` | `'Sequential'\|'Concurrent'\|null` | The dependencies for the plan. This must be "Sequential" or "Concurrent". |
| `endDate` | `CreateDateFieldRequest` | The end date field for the plan. |
| `inferredDates` | `'None'\|'SprintDates'\|'ReleaseDates'\|null` | The inferred dates for the plan. This must be "None", "SprintDates" or "ReleaseDates". |
| `startDate` | `CreateDateFieldRequest` | The start date field for the plan. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CreatePlanRequest](/docs/schema/create-plan-request.md) |
