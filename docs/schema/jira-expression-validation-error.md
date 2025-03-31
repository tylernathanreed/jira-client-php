# Jira Expression Validation Error

Details about syntax and type errors.
The error details apply to the entire expression, unless the object includes:

 - `line` and `column`
 - `expression`

Source: [`Jira\Client\Schema\JiraExpressionValidationError`](/src/Schema/JiraExpressionValidationError.php)

| Property | Type | Description |
| --- | --- | --- |
| `message` | `` | Details about the error. |
| `type` | `'syntax'|'type'|'other'` | The error type. |
| `column` | `` | The text column in which the error occurred. |
| `expression` | `` | The part of the expression in which the error occurred. |
| `line` | `` | The text line in which the error occurred. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraExpressionAnalysis](/docs/schema/jira-expression-analysis.md) |
