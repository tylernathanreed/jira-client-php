# Issue Field Option

Details of the options for a select list issue field.

Source: [`Jira\Client\Schema\IssueFieldOption`](/src/Schema/IssueFieldOption.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The unique identifier for the option. This is only unique within the select field's set of options. |
| `value` | `string` | The option's name, which is displayed in Jira. |
| `config` | `IssueFieldOptionConfiguration` |  |
| `properties` | `array<string,mixed>` | The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [createIssueFieldOption](/docs/operations/issue-custom-field-options-apps.md#create-issue-field-option) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [getIssueFieldOption](/docs/operations/issue-custom-field-options-apps.md#get-issue-field-option) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [updateIssueFieldOption](/docs/operations/issue-custom-field-options-apps.md#update-issue-field-option) |

### Schema

| Schema |
| --- |
| [PageBeanIssueFieldOption](/docs/schema/page-bean-issue-field-option.md) |
