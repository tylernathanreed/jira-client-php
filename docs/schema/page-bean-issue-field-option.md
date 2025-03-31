# Page Bean Issue Field Option

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueFieldOption`](/src/Schema/PageBeanIssueFieldOption.php)

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
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getAllIssueFieldOptions](/docs/operations/issue-custom-field-options-apps.md#get-all-issue-field-options) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getSelectableIssueFieldOptions](/docs/operations/issue-custom-field-options-apps.md#get-selectable-issue-field-options) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getVisibleIssueFieldOptions](/docs/operations/issue-custom-field-options-apps.md#get-visible-issue-field-options) |

### Schema

*None*
