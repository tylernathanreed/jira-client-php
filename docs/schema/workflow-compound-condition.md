# Workflow Compound Condition

A compound workflow transition rule condition.
This object returns `nodeType` as `compound`.

Source: [`Jira\Client\Schema\WorkflowCompoundCondition`](/src/Schema/WorkflowCompoundCondition.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditions` | `list<WorkflowCompoundCondition|WorkflowSimpleCondition>` | The list of workflow conditions. |
| `nodeType` | `` |  |
| `operator` | `'AND'|'OR'` | The compound condition operator. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCondition](/docs/schema/workflow-condition.md) |
