# Page Bean Version

A page of items.

Source: [`Jira\Client\Schema\PageBeanVersion`](/src/Schema/PageBeanVersion.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<Version>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [getProjectVersionsPaginated](/docs/operations/project-versions.md#get-project-versions-paginated) |

### Schema

*None*
