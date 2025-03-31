# Page Bean Workflow Transition Rules

A page of items.

Source: [`Jira\Client\Schema\PageBeanWorkflowTransitionRules`](/src/Schema/PageBeanWorkflowTransitionRules.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<WorkflowTransitionRules>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowTransitionRules](/docs/operations/workflow-transition-rules.md) | [getWorkflowTransitionRuleConfigurations](/docs/operations/workflow-transition-rules.md#get-workflow-transition-rule-configurations) |

### Schema

*None*
