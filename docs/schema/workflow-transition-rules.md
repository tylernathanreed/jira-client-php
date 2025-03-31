# Workflow Transition Rules

A workflow with transition rules.

Source: [`Jira\Client\Schema\WorkflowTransitionRules`](/src/Schema/WorkflowTransitionRules.php)

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `WorkflowId` |  |
| `conditions` | [`?list<AppWorkflowTransitionRule>`](/docs/schema/app-workflow-transition-rule.md) | The list of conditions within the workflow. |
| `postFunctions` | [`?list<AppWorkflowTransitionRule>`](/docs/schema/app-workflow-transition-rule.md) | The list of post functions within the workflow. |
| `validators` | [`?list<AppWorkflowTransitionRule>`](/docs/schema/app-workflow-transition-rule.md) | The list of validators within the workflow. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanWorkflowTransitionRules](/docs/schema/page-bean-workflow-transition-rules.md) |
| [WorkflowRulesSearchDetails](/docs/schema/workflow-rules-search-details.md) |
| [WorkflowTransitionRulesUpdate](/docs/schema/workflow-transition-rules-update.md) |
