# Page Bean Workflow Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanWorkflowScheme`](/src/Schema/PageBeanWorkflowScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<WorkflowScheme>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [getAllWorkflowSchemes](/docs/operations/workflow-schemes.md#get-all-workflow-schemes) |

### Schema

*None*
