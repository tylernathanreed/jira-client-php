# Workflow Transition Rules Update Error Details

Details of any errors encountered while updating workflow transition rules for a workflow.

Source: [`Jira\Client\Schema\WorkflowTransitionRulesUpdateErrorDetails`](src/Schema/WorkflowTransitionRulesUpdateErrorDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `ruleUpdateErrors` | `object` | A list of transition rule update errors, indexed by the transition rule ID. Any transition rule that appears here wasn't updated. |
| `updateErrors` | `array` | The list of errors that specify why the workflow update failed. The workflow was not updated if the list contains any entries. |
| `workflowId` | `WorkflowId` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowTransitionRulesUpdateErrors](/docs/schema/workflow-transition-rules-update-errors.md) |
