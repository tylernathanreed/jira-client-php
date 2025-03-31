# Jira Expression Analysis

Details about the analysed Jira expression.

Source: [`Jira\Client\Schema\JiraExpressionAnalysis`](/src/Schema/JiraExpressionAnalysis.php)

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `string` | The analysed expression. |
| `valid` | `bool` | Whether the expression is valid and the interpreter will evaluate it. Note that the expression may fail at runtime (for example, if it executes too many expensive operations). |
| `complexity` | [`JiraExpressionComplexity`](/docs/schema/jira-expression-complexity.md) |  |
| `errors` | [`?list<JiraExpressionValidationError>`](/docs/schema/jira-expression-validation-error.md) | A list of validation errors. Not included if the expression is valid. |
| `type` | `string` | EXPERIMENTAL. The inferred type of the expression. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JiraExpressionsAnalysis](/docs/schema/jira-expressions-analysis.md) |
