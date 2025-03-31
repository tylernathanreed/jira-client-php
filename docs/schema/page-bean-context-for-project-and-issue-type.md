# Page Bean Context For Project And Issue Type

A page of items.

Source: [`Jira\Client\Schema\PageBeanContextForProjectAndIssueType`](/src/Schema/PageBeanContextForProjectAndIssueType.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<ContextForProjectAndIssueType>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getCustomFieldContextsForProjectsAndIssueTypes](/docs/operations/issue-custom-field-contexts.md#get-custom-field-contexts-for-projects-and-issue-types) |

### Schema

*None*
