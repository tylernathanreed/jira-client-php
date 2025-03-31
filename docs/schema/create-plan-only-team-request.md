# Create Plan Only Team Request


Source: [`Jira\Client\Schema\CreatePlanOnlyTeamRequest`](/src/Schema/CreatePlanOnlyTeamRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The plan-only team name. |
| `planningStyle` | `'Scrum'|'Kanban'` | The planning style for the plan-only team. This must be "Scrum" or "Kanban". |
| `capacity` | `` | The capacity for the plan-only team. |
| `issueSourceId` | `` | The ID of the issue source for the plan-only team. |
| `memberAccountIds` | `?list<string>` | The account IDs of the plan-only team members. |
| `sprintLength` | `` | The sprint length for the plan-only team. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [createPlanOnlyTeam](/docs/operations/teams-in-plan.md#create-plan-only-team) |

### Schema

*None*
