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
| `values` | `?list<[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)Date\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)DateTime\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)Float\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeDateTimeField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeGroupField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeMultiGroupField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeNumberField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeObjectField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeStringField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeMultiStringField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeUserField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ForgeMultiUserField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)MultipleGroupPicker\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)SingleGroupPicker\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)Labels\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)MultiUserPicker\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)CascadingOption\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)MultipleOption\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)SingleOption\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)Project\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)ReadOnly\|CustomFieldContextSingleUserPickerDefaults\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)TextArea\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)TextField\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)URL\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)MultipleVersionPicker\|[CustomFieldContextDefaultValue](/src/Schema/CustomFieldContextDefaultValue.php)SingleVersionPicker>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldContexts](/docs/operations/issue-custom-field-contexts.md) | [getDefaultValues](/docs/operations/issue-custom-field-contexts.md#get-default-values) |

### Schema

*None*
