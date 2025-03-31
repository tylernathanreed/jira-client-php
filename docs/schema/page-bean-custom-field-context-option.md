# Page Bean Custom Field Context Option

A page of items.

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextOption`](/src/Schema/PageBeanCustomFieldContextOption.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<CustomFieldContextOption>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptions](/docs/operations/issue-custom-field-options.md) | [getOptionsForContext](/docs/operations/issue-custom-field-options.md#get-options-for-context) |

### Schema

*None*
