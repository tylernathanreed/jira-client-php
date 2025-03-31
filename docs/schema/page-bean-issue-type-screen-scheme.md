# Page Bean Issue Type Screen Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueTypeScreenScheme`](/src/Schema/PageBeanIssueTypeScreenScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<IssueTypeScreenScheme>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeScreenSchemes](/docs/operations/issue-type-screen-schemes.md) | [getIssueTypeScreenSchemes](/docs/operations/issue-type-screen-schemes.md#get-issue-type-screen-schemes) |

### Schema

| Group | Operation |
| --- | --- |
| [ScreenScheme](/docs/schema/screen-scheme.md) |
