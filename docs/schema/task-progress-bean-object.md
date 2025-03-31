# Task Progress Bean Object

Details about a task.

Source: [`Jira\Client\Schema\TaskProgressBeanObject`](/src/Schema/TaskProgressBeanObject.php)

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `` | The execution time of the task, in milliseconds. |
| `id` | `` | The ID of the task. |
| `lastUpdate` | `` | A timestamp recording when the task progress was last updated. |
| `progress` | `` | The progress of the task, as a percentage complete. |
| `self` | `` | The URL of the task. |
| `status` | `'ENQUEUED'|'RUNNING'|'COMPLETE'|'FAILED'|'CANCEL_REQUESTED'|'CANCELLED'|'DEAD'` | The status of the task. |
| `submitted` | `` | A timestamp recording when the task was submitted. |
| `submittedBy` | `` | The ID of the user who submitted the task. |
| `description` | `` | The description of the task. |
| `finished` | `` | A timestamp recording when the task was finished. |
| `message` | `` | Information about the progress of the task. |
| `result` | `` | The result of the task execution. |
| `started` | `` | A timestamp recording when the task was started. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFields](/docs/operations/issue-fields.md) | [deleteCustomField](/docs/operations/issue-fields.md#delete-custom-field) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [associateSchemesToProjects](/docs/operations/issue-security-schemes.md#associate-schemes-to-projects) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [removeLevel](/docs/operations/issue-security-schemes.md#remove-level) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [deletePriority](/docs/operations/issue-priorities.md#delete-priority) |
| [Projects](/docs/operations/projects.md) | [deleteProjectAsynchronously](/docs/operations/projects.md#delete-project-asynchronously) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [deleteResolution](/docs/operations/issue-resolutions.md#delete-resolution) |
| [Tasks](/docs/operations/tasks.md) | [getTask](/docs/operations/tasks.md#get-task) |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [updateSchemes](/docs/operations/workflow-schemes.md#update-schemes) |
| [WorkflowSchemeDrafts](/docs/operations/workflow-scheme-drafts.md) | [publishDraftWorkflowScheme](/docs/operations/workflow-scheme-drafts.md#publish-draft-workflow-scheme) |

### Schema

*None*
