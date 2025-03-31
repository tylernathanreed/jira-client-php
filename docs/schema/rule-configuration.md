# Rule Configuration

A rule configuration.

Source: [`Jira\Client\Schema\RuleConfiguration`](/src/Schema/RuleConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `string` | Configuration of the rule, as it is stored by the Connect or the Forge app on the rule configuration page. |
| `disabled` | `bool` | Whether the rule is disabled. |
| `tag` | `string` | A tag used to filter rules in [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get). |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [AppWorkflowTransitionRule](/docs/schema/app-workflow-transition-rule.md) |
| [ConnectWorkflowTransitionRule](/docs/schema/connect-workflow-transition-rule.md) |
