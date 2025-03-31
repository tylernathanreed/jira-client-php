# Add Atlassian Team Request


Source: [`Jira\Client\Schema\AddAtlassianTeamRequest`](src/Schema/AddAtlassianTeamRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The Atlassian team ID. |
| `planningStyle` | `string` | The planning style for the Atlassian team. This must be "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the Atlassian team. |
| `issueSourceId` | `int` | The ID of the issue source for the Atlassian team. |
| `sprintLength` | `int` | The sprint length for the Atlassian team. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [addAtlassianTeam](/docs/operations/teams-in-plan.md#add-atlassian-team) |

### Schema

*None*
