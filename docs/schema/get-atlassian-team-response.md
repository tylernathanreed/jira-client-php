# Get Atlassian Team Response


Source: [`Jira\Client\Schema\GetAtlassianTeamResponse`](src/Schema/GetAtlassianTeamResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The Atlassian team ID. |
| `planningStyle` | `string` | The planning style for the Atlassian team. This is "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the Atlassian team. |
| `issueSourceId` | `int` | The ID of the issue source for the Atlassian team. |
| `sprintLength` | `int` | The sprint length for the Atlassian team. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [getAtlassianTeam](/docs/operations/teams-in-plan.md#get-atlassian-team) |

### Schema

*None*
