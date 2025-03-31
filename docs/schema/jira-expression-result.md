# Jira Expression Result

The result of evaluating a Jira expression.

Source: [`Jira\Client\Schema\JiraExpressionResult`](/src/Schema/JiraExpressionResult.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `` | The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.) |
| `meta` | `` | Contains various characteristics of the performed expression evaluation. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [evaluateJiraExpression](/docs/operations/jira-expressions.md#evaluate-jira-expression) |

### Schema

*None*
