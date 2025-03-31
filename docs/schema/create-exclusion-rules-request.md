# Create Exclusion Rules Request


Source: [`Jira\Client\Schema\CreateExclusionRulesRequest`](/src/Schema/CreateExclusionRulesRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `?list<int>` | The IDs of the issues to exclude from the plan. |
| `issueTypeIds` | `?list<int>` | The IDs of the issue types to exclude from the plan. |
| `numberOfDaysToShowCompletedIssues` | `int` | Issues completed this number of days ago will be excluded from the plan. |
| `releaseIds` | `?list<int>` | The IDs of the releases to exclude from the plan. |
| `workStatusCategoryIds` | `?list<int>` | The IDs of the work status categories to exclude from the plan. |
| `workStatusIds` | `?list<int>` | The IDs of the work statuses to exclude from the plan. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CreatePlanRequest](/docs/schema/create-plan-request.md) |
