# Suggested Issue

An issue suggested for use in the issue picker auto-completion.

Source: [`Jira\Client\Schema\SuggestedIssue`](src/Schema/SuggestedIssue.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the issue. |
| `img` | `string` | The URL of the issue type's avatar. |
| `key` | `string` | The key of the issue. |
| `keyHtml` | `string` | The key of the issue in HTML format. |
| `summary` | `string` | The phrase containing the query string in HTML format, with the string highlighted with HTML bold tags. |
| `summaryText` | `string` | The phrase containing the query string, as plain text. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssuePickerSuggestionsIssueType](/docs/schema/issue-picker-suggestions-issue-type.md) |
