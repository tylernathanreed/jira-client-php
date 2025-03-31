# Get Plan Only Team Response


Source: [`Jira\Client\Schema\GetPlanOnlyTeamResponse`](/src/Schema/GetPlanOnlyTeamResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `` | The plan-only team ID. |
| `name` | `` | The plan-only team name. |
| `planningStyle` | `'Scrum'|'Kanban'` | The planning style for the plan-only team. This is "Scrum" or "Kanban". |
| `capacity` | `` | The capacity for the plan-only team. |
| `issueSourceId` | `` | The ID of the issue source for the plan-only team. |
| `memberAccountIds` | `?list<string>` | The account IDs of the plan-only team members. |
| `sprintLength` | `` | The sprint length for the plan-only team. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [getPlanOnlyTeam](/docs/operations/teams-in-plan.md#get-plan-only-team) |

### Schema

*None*
