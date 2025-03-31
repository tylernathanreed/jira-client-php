# Page Bean Project

A page of items.

Source: [`Jira\Client\Schema\PageBeanProject`](/src/Schema/PageBeanProject.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<Project>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [getProjectsByPriorityScheme](/docs/operations/priority-schemes.md#get-projects-by-priority-scheme) |
| [Projects](/docs/operations/projects.md) | [searchProjects](/docs/operations/projects.md#search-projects) |

### Schema

*None*
