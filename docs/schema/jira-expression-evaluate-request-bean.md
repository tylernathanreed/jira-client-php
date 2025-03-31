# Jira Expression Evaluate Request Bean

The request to evaluate a Jira expression.
This bean will be replacing `JiraExpressionEvaluateRequest` as part of new `evaluate` endpoint

Source: [`Jira\Client\Schema\JiraExpressionEvaluateRequestBean`](src/Schema/JiraExpressionEvaluateRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `string` | The Jira expression to evaluate. |
| `context` | `JiraExpressionEvaluateContextBean` | The context in which the Jira expression is evaluated. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [evaluateJSISJiraExpression](/docs/operations/jira-expressions.md#evaluate-j-s-i-s-jira-expression) |

### Schema

*None*
