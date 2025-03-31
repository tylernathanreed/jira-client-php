# Page Bean Custom Field Context Default Value

A page of items.

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextDefaultValue`](/src/Schema/PageBeanCustomFieldContextDefaultValue.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<CustomFieldContextDefaultValueDate|CustomFieldContextDefaultValueDateTime|CustomFieldContextDefaultValueFloat|CustomFieldContextDefaultValueForgeDateTimeField|CustomFieldContextDefaultValueForgeGroupField|CustomFieldContextDefaultValueForgeMultiGroupField|CustomFieldContextDefaultValueForgeNumberField|CustomFieldContextDefaultValueForgeObjectField|CustomFieldContextDefaultValueForgeStringField|CustomFieldContextDefaultValueForgeMultiStringField|CustomFieldContextDefaultValueForgeUserField|CustomFieldContextDefaultValueForgeMultiUserField|CustomFieldContextDefaultValueMultipleGroupPicker|CustomFieldContextDefaultValueSingleGroupPicker|CustomFieldContextDefaultValueLabels|CustomFieldContextDefaultValueMultiUserPicker|CustomFieldContextDefaultValueCascadingOption|CustomFieldContextDefaultValueMultipleOption|CustomFieldContextDefaultValueSingleOption|CustomFieldContextDefaultValueProject|CustomFieldContextDefaultValueReadOnly|CustomFieldContextSingleUserPickerDefaults|CustomFieldContextDefaultValueTextArea|CustomFieldContextDefaultValueTextField|CustomFieldContextDefaultValueURL|CustomFieldContextDefaultValueMultipleVersionPicker|CustomFieldContextDefaultValueSingleVersionPicker>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getDefaultValues](/docs/operations/issue-custom-field-contexts.md#get-default-values) |

### Schema

*None*
