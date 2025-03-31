# Workflow Reference Status

The statuses referenced in the workflow.

Source: [`Jira\Client\Schema\WorkflowReferenceStatus`](/src/Schema/WorkflowReferenceStatus.php)

| Property | Type | Description |
| --- | --- | --- |
| `approvalConfiguration` | [`ApprovalConfiguration`](/docs/schema/approval-configuration.md) |  |
| `deprecated` | `bool` | Indicates if the status is deprecated. |
| `layout` | [`WorkflowStatusLayout`](/docs/schema/workflow-status-layout.md) |  |
| `properties` | `array<string,string>` | The properties associated with the status. |
| `statusReference` | `string` | The reference of the status. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JiraWorkflow](/docs/schema/jira-workflow.md) |
