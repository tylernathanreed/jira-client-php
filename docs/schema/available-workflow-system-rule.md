# Available Workflow System Rule

The Atlassian provided system rules available.

Source: [`Jira\Client\Schema\AvailableWorkflowSystemRule`](/src/Schema/AvailableWorkflowSystemRule.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The rule description. |
| `incompatibleRuleKeys` | `list<string>` | List of rules that conflict with this one. |
| `isAvailableForInitialTransition` | `bool` | Whether the rule can be added added to an initial transition. |
| `isVisible` | `bool` | Whether the rule is visible. |
| `name` | `string` | The rule name. |
| `ruleKey` | `string` | The rule key. |
| `ruleType` | `'Condition'\|`<br/>`'Validator'\|`<br/>`'Function'\|`<br/>`'Screen'` | The rule type. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowCapabilities](/docs/schema/workflow-capabilities.md) |
