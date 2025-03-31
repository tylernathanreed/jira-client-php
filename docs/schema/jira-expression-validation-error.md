# Jira Expression Validation Error

Details about syntax and type errors.
The error details apply to the entire expression, unless the object includes:

 - `line` and `column`
 - `expression`

Source: [`Jira\Client\Schema\JiraExpressionValidationError`](/src/Schema/JiraExpressionValidationError.php)

| Property | Type | Description |
| --- | --- | --- |
| `message` | `string` | Details about the error. |
| `type` | `string` | The error type. |
| `column` | `int` | The text column in which the error occurred. |
| `expression` | `string` | The part of the expression in which the error occurred. |
| `line` | `int` | The text line in which the error occurred. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraExpressionAnalysis](/docs/schema/jira-expression-analysis.md) |
