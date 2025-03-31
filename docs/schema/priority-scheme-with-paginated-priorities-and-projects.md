# Priority Scheme With Paginated Priorities And Projects

A priority scheme with paginated priorities and projects.

Source: [`Jira\Client\Schema\PrioritySchemeWithPaginatedPrioritiesAndProjects`](/src/Schema/PrioritySchemeWithPaginatedPrioritiesAndProjects.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the priority scheme. |
| `name` | `string` | The name of the priority scheme |
| `default` | `bool` |  |
| `defaultPriorityId` | `string` | The ID of the default issue priority. |
| `description` | `string` | The description of the priority scheme |
| `isDefault` | `bool` |  |
| `priorities` | `PageBeanPriorityWithSequence` | The paginated list of priorities. |
| `projects` | `PageBeanProjectDetails` | The paginated list of projects. |
| `self` | `string` | The URL of the priority scheme. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects](/docs/schema/page-bean-priority-scheme-with-paginated-priorities-and-projects.md) |
| [UpdatePrioritySchemeResponseBean](/docs/schema/update-priority-scheme-response-bean.md) |
