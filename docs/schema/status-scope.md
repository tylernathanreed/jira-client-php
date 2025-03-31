# Status Scope

The scope of the status.

Source: [`Jira\Client\Schema\StatusScope`](/src/Schema/StatusScope.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'PROJECT'\|'GLOBAL'` | The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects. |
| `project` | `ProjectId` |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JiraStatus](/docs/schema/jira-status.md) |
| [StatusCreateRequest](/docs/schema/status-create-request.md) |
