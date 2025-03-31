# J Exp Evaluate Meta Data Bean

Contains information about the expression evaluation.
This bean will be replacing `JiraExpressionEvaluationMetaDataBean` bean as part of new `evaluate` endpoint

Source: [`Jira\Client\Schema\JExpEvaluateMetaDataBean`](/src/Schema/JExpEvaluateMetaDataBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `complexity` | `` | Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression. |
| `issues` | `` | Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JExpEvaluateJiraExpressionResultBean](/docs/schema/j-exp-evaluate-jira-expression-result-bean.md) |
