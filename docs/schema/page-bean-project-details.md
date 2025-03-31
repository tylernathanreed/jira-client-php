# Page Bean Project Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanProjectDetails`](/src/Schema/PageBeanProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<ProjectDetails>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeScreenSchemes](/docs/operations/issue-type-screen-schemes.md) | [getProjectsForIssueTypeScreenScheme](/docs/operations/issue-type-screen-schemes.md#get-projects-for-issue-type-screen-scheme) |

### Schema

| Group | Operation |
| --- | --- |
| [PrioritySchemeWithPaginatedPrioritiesAndProjects](/docs/schema/priority-scheme-with-paginated-priorities-and-projects.md) |
