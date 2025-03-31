# Workflow Scope

The scope of the workflow.

Source: [`Jira\Client\Schema\WorkflowScope`](/src/Schema/WorkflowScope.php)

| Property | Type | Description |
| --- | --- | --- |
| `project` | [`ProjectId`](/docs/schema/project-id.md) |  |
| `type` | `'PROJECT'\|'GLOBAL'\|null` | The scope of the workflow. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JiraWorkflow](/docs/schema/jira-workflow.md) |
| [JiraWorkflowStatus](/docs/schema/jira-workflow-status.md) |
| [WorkflowCreateRequest](/docs/schema/workflow-create-request.md) |
| [WorkflowSchemeReadResponse](/docs/schema/workflow-scheme-read-response.md) |
