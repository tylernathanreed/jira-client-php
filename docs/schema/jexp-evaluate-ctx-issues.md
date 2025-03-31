# Jexp Evaluate Ctx Issues

The JQL specifying the issues available in the evaluated Jira expression under the `issues` context variable.
This bean will be replacing `JexpIssues` bean as part of new `evaluate` endpoint

Source: [`Jira\Client\Schema\JexpEvaluateCtxIssues`](/src/Schema/JexpEvaluateCtxIssues.php)

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `JexpEvaluateCtxJqlIssues` | The JQL query that specifies the set of issues available in the Jira expression. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JiraExpressionEvaluateContextBean](/docs/schema/jira-expression-evaluate-context-bean.md) |
