# Create Exclusion Rules Request


Source: [`Jira\Client\Schema\CreateExclusionRulesRequest`](/src/Schema/CreateExclusionRulesRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `array` | The IDs of the issues to exclude from the plan. |
| `issueTypeIds` | `array` | The IDs of the issue types to exclude from the plan. |
| `numberOfDaysToShowCompletedIssues` | `int` | Issues completed this number of days ago will be excluded from the plan. |
| `releaseIds` | `array` | The IDs of the releases to exclude from the plan. |
| `workStatusCategoryIds` | `array` | The IDs of the work status categories to exclude from the plan. |
| `workStatusIds` | `array` | The IDs of the work statuses to exclude from the plan. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreatePlanRequest](/docs/schema/create-plan-request.md) |
