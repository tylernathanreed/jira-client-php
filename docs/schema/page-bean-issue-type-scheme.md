# Page Bean Issue Type Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueTypeScheme`](/src/Schema/PageBeanIssueTypeScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<IssueTypeScheme>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeSchemes](/docs/operations/issue-type-schemes.md) | [getAllIssueTypeSchemes](/docs/operations/issue-type-schemes.md#get-all-issue-type-schemes) |

### Schema

*None*
