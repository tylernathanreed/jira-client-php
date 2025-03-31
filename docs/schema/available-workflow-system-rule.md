# Available Workflow System Rule

The Atlassian provided system rules available.

Source: [`Jira\Client\Schema\AvailableWorkflowSystemRule`](/src/Schema/AvailableWorkflowSystemRule.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `` | The rule description. |
| `incompatibleRuleKeys` | `list<string>` | List of rules that conflict with this one. |
| `isAvailableForInitialTransition` | `` | Whether the rule can be added added to an initial transition. |
| `isVisible` | `` | Whether the rule is visible. |
| `name` | `` | The rule name. |
| `ruleKey` | `` | The rule key. |
| `ruleType` | `'Condition'|'Validator'|'Function'|'Screen'` | The rule type. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowCapabilities](/docs/schema/workflow-capabilities.md) |
