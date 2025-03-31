# Page Bean Custom Field Context

A page of items.

Source: [`Jira\Client\Schema\PageBeanCustomFieldContext`](/src/Schema/PageBeanCustomFieldContext.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[CustomFieldContext](/src/Schema/CustomFieldContext.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getContextsForField](/docs/operations/issue-custom-field-contexts.md#get-contexts-for-field) |

### Schema

*None*
