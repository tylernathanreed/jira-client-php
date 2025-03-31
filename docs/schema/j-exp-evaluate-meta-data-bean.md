# J Exp Evaluate Meta Data Bean

Contains information about the expression evaluation.
This bean will be replacing `JiraExpressionEvaluationMetaDataBean` bean as part of new `evaluate` endpoint

Source: [`Jira\Client\Schema\JExpEvaluateMetaDataBean`](/src/Schema/JExpEvaluateMetaDataBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `complexity` | [`JiraExpressionsComplexityBean`](/docs/schema/jira-expressions-complexity-bean.md) | Contains information about the expression complexity. For example, the number of steps it took to evaluate the expression. |
| `issues` | [`JExpEvaluateIssuesMetaBean`](/docs/schema/j-exp-evaluate-issues-meta-bean.md) | Contains information about the `issues` variable in the context. For example, is the issues were loaded with JQL, information about the page will be included here. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JExpEvaluateJiraExpressionResultBean](/docs/schema/j-exp-evaluate-jira-expression-result-bean.md) |
