# Workflow

Details about a workflow.

Source: [`Jira\Client\Schema\Workflow`](src/Schema/Workflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the workflow. |
| `id` | `PublishedWorkflowId` |  |
| `created` | `string` | The creation date of the workflow. |
| `hasDraftWorkflow` | `bool` | Whether the workflow has a draft version. |
| `isDefault` | `bool` | Whether this is the default workflow. |
| `operations` | `WorkflowOperations` |  |
| `projects` | `array` | The projects the workflow is assigned to, through workflow schemes. |
| `schemes` | `array` | The workflow schemes the workflow is assigned to. |
| `statuses` | `array` | The statuses of the workflow. |
| `transitions` | `array` | The transitions of the workflow. |
| `updated` | `string` | The last edited date of the workflow. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanWorkflow](/docs/schema/page-bean-workflow.md) |
