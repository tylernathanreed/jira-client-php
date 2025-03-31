# Page Bean Custom Field Context Project Mapping

A page of items.

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextProjectMapping`](/src/Schema/PageBeanCustomFieldContextProjectMapping.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[CustomFieldContextProjectMapping](/src/Schema/CustomFieldContextProjectMapping.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getProjectContextMapping](/docs/operations/issue-custom-field-contexts.md#get-project-context-mapping) |

### Schema

*None*
