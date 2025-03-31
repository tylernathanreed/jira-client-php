# Workflow

Details about a workflow.

Source: [`Jira\Client\Schema\Workflow`](/src/Schema/Workflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `` | The description of the workflow. |
| `id` | `` |  |
| `created` | `` | The creation date of the workflow. |
| `hasDraftWorkflow` | `` | Whether the workflow has a draft version. |
| `isDefault` | `` | Whether this is the default workflow. |
| `operations` | `` |  |
| `projects` | `?list<ProjectDetails>` | The projects the workflow is assigned to, through workflow schemes. |
| `schemes` | `?list<WorkflowSchemeIdName>` | The workflow schemes the workflow is assigned to. |
| `statuses` | `?list<WorkflowStatus>` | The statuses of the workflow. |
| `transitions` | `?list<Transition>` | The transitions of the workflow. |
| `updated` | `` | The last edited date of the workflow. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanWorkflow](/docs/schema/page-bean-workflow.md) |
