# Approval Configuration

The approval configuration of a status within a workflow.
Applies only to Jira Service Management approvals.

Source: [`Jira\Client\Schema\ApprovalConfiguration`](/src/Schema/ApprovalConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `active` | `'true'\|'false'` | Whether the approval configuration is active. |
| `conditionType` | `'number'\|'percent'\|'numberPerPrincipal'` | How the required approval count is calculated. It may be configured to require a specific number of approvals, or approval by a percentage of approvers. If the approvers source field is Approver groups, you can configure how many approvals per group are required for the request to be approved. The number will be the same across all groups. |
| `conditionValue` | `string` | The number or percentage of approvals required for a request to be approved. If `conditionType` is `number`, the value must be 20 or less. If `conditionType` is `percent`, the value must be 100 or less. |
| `fieldId` | `string` | The custom field ID of the "Approvers" or "Approver Groups" field. |
| `transitionApproved` | `string` | The numeric ID of the transition to be executed if the request is approved. |
| `transitionRejected` | `string` | The numeric ID of the transition to be executed if the request is declined. |
| `exclude` | `?list<string>` | A list of roles that should be excluded as possible approvers. |
| `prePopulatedFieldId` | `string` | The custom field ID of the field used to pre-populate the Approver field. Only supports the "Affected Services" field. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [StatusLayoutUpdate](/docs/schema/status-layout-update.md) |
| [WorkflowReferenceStatus](/docs/schema/workflow-reference-status.md) |
