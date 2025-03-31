# Page Bean Issue Type Scheme Projects

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueTypeSchemeProjects`](/src/Schema/PageBeanIssueTypeSchemeProjects.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<IssueTypeSchemeProjects>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeSchemes](/docs/operations/issue-type-schemes.md) | [getIssueTypeSchemeForProjects](/docs/operations/issue-type-schemes.md#get-issue-type-scheme-for-projects) |

### Schema

*None*
