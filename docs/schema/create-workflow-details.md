# Create Workflow Details

The details of a workflow.

Source: [`Jira\Client\Schema\CreateWorkflowDetails`](/src/Schema/CreateWorkflowDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the workflow. The name must be unique. The maximum length is 255 characters. Characters can be separated by a whitespace but the name cannot start or end with a whitespace. |
| `statuses` | [`list<CreateWorkflowStatusDetails>`](/src/Schema/CreateWorkflowStatusDetails.php) | The statuses of the workflow. Any status that does not include a transition is added to the workflow without a transition. |
| `transitions` | [`list<CreateWorkflowTransitionDetails>`](/src/Schema/CreateWorkflowTransitionDetails.php) | The transitions of the workflow. For the request to be valid, these transitions must:

 *  include one *initial* transition.
 *  not use the same name for a *global* and *directed* transition.
 *  have a unique name for each *global* transition.
 *  have a unique 'to' status for each *global* transition.
 *  have unique names for each transition from a status.
 *  not have a 'from' status on *initial* and *global* transitions.
 *  have a 'from' status on *directed* transitions.

All the transition statuses must be included in `statuses`. |
| `description` | `string` | The description of the workflow. The maximum length is 1000 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [createWorkflow](/docs/operations/workflows.md#create-workflow) |

### Schema

*None*
