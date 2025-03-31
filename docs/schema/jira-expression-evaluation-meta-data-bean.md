# Jira Expression Evaluation Meta Data Bean


Source: [`Jira\Client\Schema\JiraExpressionEvaluationMetaDataBean`](src/Schema/JiraExpressionEvaluationMetaDataBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `complexity` | `JiraExpressionsComplexityBean` | Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression. |
| `issues` | `IssuesMetaBean` | Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JiraExpressionResult](/docs/schema/jira-expression-result.md) |
