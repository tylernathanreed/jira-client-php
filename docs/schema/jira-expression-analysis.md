# Jira Expression Analysis

Details about the analysed Jira expression.

Source: [`Jira\Client\Schema\JiraExpressionAnalysis`](/src/Schema/JiraExpressionAnalysis.php)

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `` | The analysed expression. |
| `valid` | `` | Whether the expression is valid and the interpreter will evaluate it. Note that the expression may fail at runtime (for example, if it executes too many expensive operations). |
| `complexity` | `` |  |
| `errors` | `?list<JiraExpressionValidationError>` | A list of validation errors. Not included if the expression is valid. |
| `type` | `` | EXPERIMENTAL. The inferred type of the expression. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraExpressionsAnalysis](/docs/schema/jira-expressions-analysis.md) |
