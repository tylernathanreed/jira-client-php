# Workflow Search Response

Page of items, including workflows and related statuses.

Source: [`Jira\Client\Schema\WorkflowSearchResponse`](/src/Schema/WorkflowSearchResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `statuses` | `?list<JiraWorkflowStatus>` | List of statuses. |
| `total` | `` | The number of items returned. |
| `values` | `?list<JiraWorkflow>` | List of workflows. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [searchWorkflows](/docs/operations/workflows.md#search-workflows) |

### Schema

*None*
