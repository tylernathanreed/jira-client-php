# Jira Expressions Complexity Bean


Source: [`Jira\Client\Schema\JiraExpressionsComplexityBean`](/src/Schema/JiraExpressionsComplexityBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `beans` | `JiraExpressionsComplexityValueBean` | The number of Jira REST API beans returned in the response. |
| `expensiveOperations` | `JiraExpressionsComplexityValueBean` | The number of expensive operations executed while evaluating the expression. Expensive operations are those that load additional data, such as entity properties, comments, or custom fields. |
| `primitiveValues` | `JiraExpressionsComplexityValueBean` | The number of primitive values returned in the response. |
| `steps` | `JiraExpressionsComplexityValueBean` | The number of steps it took to evaluate the expression, where a step is a high-level operation performed by the expression. A step is an operation such as arithmetic, accessing a property, accessing a context variable, or calling a function. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JExpEvaluateMetaDataBean](/docs/schema/j-exp-evaluate-meta-data-bean.md) |
| [JiraExpressionEvaluationMetaDataBean](/docs/schema/jira-expression-evaluation-meta-data-bean.md) |
