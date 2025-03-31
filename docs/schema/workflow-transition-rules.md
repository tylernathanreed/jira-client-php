# Workflow Transition Rules

A workflow with transition rules.

Source: [`Jira\Client\Schema\WorkflowTransitionRules`](/src/Schema/WorkflowTransitionRules.php)

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `` |  |
| `conditions` | `?list<AppWorkflowTransitionRule>` | The list of conditions within the workflow. |
| `postFunctions` | `?list<AppWorkflowTransitionRule>` | The list of post functions within the workflow. |
| `validators` | `?list<AppWorkflowTransitionRule>` | The list of validators within the workflow. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanWorkflowTransitionRules](/docs/schema/page-bean-workflow-transition-rules.md) |
| [WorkflowRulesSearchDetails](/docs/schema/workflow-rules-search-details.md) |
| [WorkflowTransitionRulesUpdate](/docs/schema/workflow-transition-rules-update.md) |
