# Get Plan Only Team Response


Source: [`Jira\Client\Schema\GetPlanOnlyTeamResponse`](/src/Schema/GetPlanOnlyTeamResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The plan-only team ID. |
| `name` | `string` | The plan-only team name. |
| `planningStyle` | `string` | The planning style for the plan-only team. This is "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the plan-only team. |
| `issueSourceId` | `int` | The ID of the issue source for the plan-only team. |
| `memberAccountIds` | `array` | The account IDs of the plan-only team members. |
| `sprintLength` | `int` | The sprint length for the plan-only team. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [getPlanOnlyTeam](/docs/operations/teams-in-plan.md#get-plan-only-team) |

### Schema

*None*
