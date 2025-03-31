# Workflow

Details about a workflow.

Source: [`Jira\Client\Schema\Workflow`](/src/Schema/Workflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the workflow. |
| `id` | `PublishedWorkflowId` |  |
| `created` | `string` | The creation date of the workflow. |
| `hasDraftWorkflow` | `bool` | Whether the workflow has a draft version. |
| `isDefault` | `bool` | Whether this is the default workflow. |
| `operations` | `WorkflowOperations` |  |
| `projects` | [`?list<ProjectDetails>`](/docs/schema/project-details.md) | The projects the workflow is assigned to, through workflow schemes. |
| `schemes` | [`?list<WorkflowSchemeIdName>`](/docs/schema/workflow-scheme-id-name.md) | The workflow schemes the workflow is assigned to. |
| `statuses` | [`?list<WorkflowStatus>`](/docs/schema/workflow-status.md) | The statuses of the workflow. |
| `transitions` | [`?list<Transition>`](/docs/schema/transition.md) | The transitions of the workflow. |
| `updated` | `string` | The last edited date of the workflow. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanWorkflow](/docs/schema/page-bean-workflow.md) |
