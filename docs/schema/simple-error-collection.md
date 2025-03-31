# Simple Error Collection


Source: [`Jira\Client\Schema\SimpleErrorCollection`](/src/Schema/SimpleErrorCollection.php)

| Property | Type | Description |
| --- | --- | --- |
| `errorMessages` | `?list<string>` | The list of error messages produced by this operation. For example, "input parameter 'key' must be provided" |
| `errors` | `array<string,string>` | The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters." |
| `httpStatusCode` | `int` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [RemoveOptionFromIssuesResult](/docs/schema/remove-option-from-issues-result.md) |
