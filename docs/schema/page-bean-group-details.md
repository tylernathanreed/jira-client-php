# Page Bean Group Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanGroupDetails`](/src/Schema/PageBeanGroupDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<GroupDetails>`](/src/Schema/GroupDetails.php) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Groups](/docs/operations/groups.md) | [bulkGetGroups](/docs/operations/groups.md#bulk-get-groups) |

### Schema

*None*
