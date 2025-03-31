# Page Bean Issue Field Option

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueFieldOption`](/src/Schema/PageBeanIssueFieldOption.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<IssueFieldOption>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getAllIssueFieldOptions](/docs/operations/issue-custom-field-options-apps.md#get-all-issue-field-options) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getSelectableIssueFieldOptions](/docs/operations/issue-custom-field-options-apps.md#get-selectable-issue-field-options) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getVisibleIssueFieldOptions](/docs/operations/issue-custom-field-options-apps.md#get-visible-issue-field-options) |

### Schema

*None*
