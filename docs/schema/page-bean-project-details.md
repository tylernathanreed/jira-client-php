# Page Bean Project Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanProjectDetails`](/src/Schema/PageBeanProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[ProjectDetails](/src/Schema/ProjectDetails.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeScreenSchemes](/docs/operations/issue-type-screen-schemes.md) | [getProjectsForIssueTypeScreenScheme](/docs/operations/issue-type-screen-schemes.md#get-projects-for-issue-type-screen-scheme) |

### Schema

| Group | Operation |
| --- | --- |
| [PrioritySchemeWithPaginatedPrioritiesAndProjects](/docs/schema/priority-scheme-with-paginated-priorities-and-projects.md) |
