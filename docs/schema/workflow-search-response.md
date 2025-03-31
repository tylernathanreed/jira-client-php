# Workflow Search Response

Page of items, including workflows and related statuses.

Source: [`Jira\Client\Schema\WorkflowSearchResponse`](/src/Schema/WorkflowSearchResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `statuses` | `?list<[JiraWorkflowStatus](/src/Schema/JiraWorkflowStatus.php)>` | List of statuses. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[JiraWorkflow](/src/Schema/JiraWorkflow.php)>` | List of workflows. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [searchWorkflows](/docs/operations/workflows.md#search-workflows) |

### Schema

*None*
