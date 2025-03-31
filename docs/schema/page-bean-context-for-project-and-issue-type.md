# Page Bean Context For Project And Issue Type

A page of items.

Source: [`Jira\Client\Schema\PageBeanContextForProjectAndIssueType`](src/Schema/PageBeanContextForProjectAndIssueType.php)

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
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getCustomFieldContextsForProjectsAndIssueTypes](/docs/operations/issue-custom-field-contexts.md#get-custom-field-contexts-for-projects-and-issue-types) |

### Schema

*None*
