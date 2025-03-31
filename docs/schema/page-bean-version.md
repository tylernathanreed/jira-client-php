# Page Bean Version

A page of items.

Source: [`Jira\Client\Schema\PageBeanVersion`](/src/Schema/PageBeanVersion.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Version>`](/docs/schema/version.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [getProjectVersionsPaginated](/docs/operations/project-versions.md#get-project-versions-paginated) |

### Schema

*None*
