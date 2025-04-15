# Jira Expression Eval Context Bean


Source: [`Jira\Client\Schema\JiraExpressionEvalContextBean`](/src/Schema/JiraExpressionEvalContextBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `board` | `int` | The ID of the board that is available under the `board` variable when evaluating the expression. |
| `custom` | [`?list<IssueContextVariable\|JsonContextVariable\|UserContextVariable>`](/docs/schema/custom-context-variable.md) | Custom context variables and their types. These variable types are available for use in a custom context:<br/><br/> *  `user`: A [user](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user) specified as an Atlassian account ID.<br/> *  `issue`: An [issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue) specified by ID or key. All the fields of the issue object are available in the Jira expression.<br/> *  `json`: A JSON object containing custom content.<br/> *  `list`: A JSON list of `user`, `issue`, or `json` variable types. |
| `customerRequest` | `int` | The ID of the customer request that is available under the `customerRequest` variable when evaluating the expression. This is the same as the ID of the underlying Jira issue, but the customer request context variable will have a different type. |
| `issue` | [`IdOrKeyBean`](/docs/schema/id-or-key-bean.md) | The issue that is available under the `issue` variable when evaluating the expression. |
| `issues` | [`JexpIssues`](/docs/schema/jexp-issues.md) | The collection of issues that is available under the `issues` variable when evaluating the expression. |
| `project` | [`IdOrKeyBean`](/docs/schema/id-or-key-bean.md) | The project that is available under the `project` variable when evaluating the expression. |
| `serviceDesk` | `int` | The ID of the service desk that is available under the `serviceDesk` variable when evaluating the expression. |
| `sprint` | `int` | The ID of the sprint that is available under the `sprint` variable when evaluating the expression. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JiraExpressionEvalRequestBean](/docs/schema/jira-expression-eval-request-bean.md) |
