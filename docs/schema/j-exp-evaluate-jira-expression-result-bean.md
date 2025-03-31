# J Exp Evaluate Jira Expression Result Bean

The result of evaluating a Jira expression.This bean will be replacing `JiraExpressionResultBean` bean as part of new evaluate endpoint

Source: [`Jira\Client\Schema\JExpEvaluateJiraExpressionResultBean`](src/Schema/JExpEvaluateJiraExpressionResultBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `` | The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.) |
| `meta` | `JExpEvaluateMetaDataBean` | Contains various characteristics of the performed expression evaluation. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [evaluateJSISJiraExpression](/docs/operations/jira-expressions.md#evaluate-j-s-i-s-jira-expression) |

### Schema

*None*
