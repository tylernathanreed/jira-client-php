# Page Bean Context

A page of items.

Source: [`Jira\Client\Schema\PageBeanContext`](/src/Schema/PageBeanContext.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Context>`](/docs/schemas/context.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFields](/docs/operations/issue-fields.md) | [getContextsForFieldDeprecated](/docs/operations/issue-fields.md#get-contexts-for-field-deprecated) |

### Schema

*None*
