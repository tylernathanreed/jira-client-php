# Issue Field Option Create Bean


Source: [`Jira\Client\Schema\IssueFieldOptionCreateBean`](/src/Schema/IssueFieldOptionCreateBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `` | The option's name, which is displayed in Jira. |
| `config` | `` |  |
| `properties` | `array<string,mixed>` | The properties of the option as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/) are defined in the descriptor for the issue field module. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [createIssueFieldOption](/docs/operations/issue-custom-field-options-apps.md#create-issue-field-option) |

### Schema

*None*
