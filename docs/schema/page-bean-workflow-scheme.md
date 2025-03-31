# Page Bean Workflow Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanWorkflowScheme`](/src/Schema/PageBeanWorkflowScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<WorkflowScheme>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [getAllWorkflowSchemes](/docs/operations/workflow-schemes.md#get-all-workflow-schemes) |

### Schema

*None*
