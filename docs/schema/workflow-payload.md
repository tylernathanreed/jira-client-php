# Workflow Payload

The payload for creating workflow, see https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/\#api-rest-api-3-workflows-create-post

Source: [`Jira\Client\Schema\WorkflowPayload`](/src/Schema/WorkflowPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the workflow |
| `loopedTransitionContainerLayout` | [`WorkflowStatusLayoutPayload`](/docs/schema/workflow-status-layout-payload.md) |  |
| `name` | `string` | The name of the workflow |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The strategy to use if there is a conflict with another workflow |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `startPointLayout` | [`WorkflowStatusLayoutPayload`](/docs/schema/workflow-status-layout-payload.md) |  |
| `statuses` | [`?list<WorkflowStatusPayload>`](/docs/schema/workflow-status-payload.md) | The statuses to be used in the workflow |
| `transitions` | [`?list<TransitionPayload>`](/docs/schema/transition-payload.md) | The transitions for the workflow |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowCapabilityPayload](/docs/schema/workflow-capability-payload.md) |
