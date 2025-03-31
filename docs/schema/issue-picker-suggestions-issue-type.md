# Issue Picker Suggestions Issue Type

A type of issue suggested for use in auto-completion.

Source: [`Jira\Client\Schema\IssuePickerSuggestionsIssueType`](/src/Schema/IssuePickerSuggestionsIssueType.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the type of issues suggested for use in auto-completion. |
| `issues` | `?list<[SuggestedIssue](/src/Schema/SuggestedIssue.php)>` | A list of issues suggested for use in auto-completion. |
| `label` | `string` | The label of the type of issues suggested for use in auto-completion. |
| `msg` | `string` | If no issue suggestions are found, returns a message indicating no suggestions were found, |
| `sub` | `string` | If issue suggestions are found, returns a message indicating the number of issues suggestions found and returned. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssuePickerSuggestions](/docs/schema/issue-picker-suggestions.md) |
