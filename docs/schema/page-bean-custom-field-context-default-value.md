# Page Bean Custom Field Context Default Value

A page of items.

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextDefaultValue`](/src/Schema/PageBeanCustomFieldContextDefaultValue.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<CustomFieldContextDefaultValueDate\|CustomFieldContextDefaultValueDateTime\|CustomFieldContextDefaultValueFloat\|CustomFieldContextDefaultValueForgeDateTimeField\|CustomFieldContextDefaultValueForgeGroupField\|CustomFieldContextDefaultValueForgeMultiGroupField\|CustomFieldContextDefaultValueForgeNumberField\|CustomFieldContextDefaultValueForgeObjectField\|CustomFieldContextDefaultValueForgeStringField\|CustomFieldContextDefaultValueForgeMultiStringField\|CustomFieldContextDefaultValueForgeUserField\|CustomFieldContextDefaultValueForgeMultiUserField\|CustomFieldContextDefaultValueMultipleGroupPicker\|CustomFieldContextDefaultValueSingleGroupPicker\|CustomFieldContextDefaultValueLabels\|CustomFieldContextDefaultValueMultiUserPicker\|CustomFieldContextDefaultValueCascadingOption\|CustomFieldContextDefaultValueMultipleOption\|CustomFieldContextDefaultValueSingleOption\|CustomFieldContextDefaultValueProject\|CustomFieldContextDefaultValueReadOnly\|CustomFieldContextSingleUserPickerDefaults\|CustomFieldContextDefaultValueTextArea\|CustomFieldContextDefaultValueTextField\|CustomFieldContextDefaultValueURL\|CustomFieldContextDefaultValueMultipleVersionPicker\|CustomFieldContextDefaultValueSingleVersionPicker>`](/src/Schema/CustomFieldContextDefaultValue.php) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getDefaultValues](/docs/operations/issue-custom-field-contexts.md#get-default-values) |

### Schema

*None*
