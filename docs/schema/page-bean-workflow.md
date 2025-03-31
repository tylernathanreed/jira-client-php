# Page Bean Workflow

A page of items.

Source: [`Jira\Client\Schema\PageBeanWorkflow`](/src/Schema/PageBeanWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<Workflow>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [getWorkflowsPaginated](/docs/operations/workflows.md#get-workflows-paginated) |

### Schema

*None*
