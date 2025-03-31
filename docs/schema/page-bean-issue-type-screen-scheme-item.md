# Page Bean Issue Type Screen Scheme Item

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueTypeScreenSchemeItem`](/src/Schema/PageBeanIssueTypeScreenSchemeItem.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `array` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeScreenSchemes](/docs/operations/issue-type-screen-schemes.md) | [getIssueTypeScreenSchemeMappings](/docs/operations/issue-type-screen-schemes.md#get-issue-type-screen-scheme-mappings) |

### Schema

*None*
