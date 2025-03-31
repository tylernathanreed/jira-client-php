# Jira Expression For Analysis

Details of Jira expressions for analysis.

Source: [`Jira\Client\Schema\JiraExpressionForAnalysis`](src/Schema/JiraExpressionForAnalysis.php)

| Property | Type | Description |
| --- | --- | --- |
| `expressions` | `array` | The list of Jira expressions to analyse. |
| `contextVariables` | `object` | Context variables and their types. The type checker assumes that [common context variables](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#context-variables), such as `issue` or `project`, are available in context and sets their type. Use this property to override the default types or provide details of new variables. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [analyseExpression](/docs/operations/jira-expressions.md#analyse-expression) |

### Schema

*None*
