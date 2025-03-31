# Workflow Read Request


Source: [`Jira\Client\Schema\WorkflowReadRequest`](/src/Schema/WorkflowReadRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `projectAndIssueTypes` | [`?list<ProjectAndIssueTypePair>`](/src/Schema/ProjectAndIssueTypePair.php) | The list of projects and issue types to query. |
| `workflowIds` | `?list<string>` | The list of workflow IDs to query. |
| `workflowNames` | `?list<string>` | The list of workflow names to query. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [readWorkflows](/docs/operations/workflows.md#read-workflows) |

### Schema

*None*
