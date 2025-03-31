# Page Bean Issue Type Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueTypeScheme`](/src/Schema/PageBeanIssueTypeScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[IssueTypeScheme](/src/Schema/IssueTypeScheme.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeSchemes](/docs/operations/issue-type-schemes.md) | [getAllIssueTypeSchemes](/docs/operations/issue-type-schemes.md#get-all-issue-type-schemes) |

### Schema

*None*
