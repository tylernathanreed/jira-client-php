# Page Bean Custom Field Context Option

A page of items.

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextOption`](/src/Schema/PageBeanCustomFieldContextOption.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<CustomFieldContextOption>`](/src/Schema/CustomFieldContextOption.php) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptions](/docs/operations/issue-custom-field-options.md) | [getOptionsForContext](/docs/operations/issue-custom-field-options.md#get-options-for-context) |

### Schema

*None*
