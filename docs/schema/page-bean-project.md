# Page Bean Project

A page of items.

Source: [`Jira\Client\Schema\PageBeanProject`](/src/Schema/PageBeanProject.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Project>`](/docs/schema/project.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [PrioritySchemes](/docs/operations/priority-schemes.md) | [getProjectsByPriorityScheme](/docs/operations/priority-schemes.md#get-projects-by-priority-scheme) |
| [Projects](/docs/operations/projects.md) | [searchProjects](/docs/operations/projects.md#search-projects) |

### Schema

*None*
