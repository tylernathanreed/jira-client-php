# Get Exclusion Rules Response


Source: [`Jira\Client\Schema\GetExclusionRulesResponse`](src/Schema/GetExclusionRulesResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `numberOfDaysToShowCompletedIssues` | `int` | Issues completed this number of days ago are excluded from the plan. |
| `issueIds` | `array` | The IDs of the issues excluded from the plan. |
| `issueTypeIds` | `array` | The IDs of the issue types excluded from the plan. |
| `releaseIds` | `array` | The IDs of the releases excluded from the plan. |
| `workStatusCategoryIds` | `array` | The IDs of the work status categories excluded from the plan. |
| `workStatusIds` | `array` | The IDs of the work statuses excluded from the plan. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [GetPlanResponse](/docs/schema/get-plan-response.md) |
