# Workflow Element Reference

A reference to the location of the error.
This will be null if the error does not refer to a specific element.

Source: [`Jira\Client\Schema\WorkflowElementReference`](/src/Schema/WorkflowElementReference.php)

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | A property key. |
| `ruleId` | `string` | A rule ID. |
| `statusMappingReference` | [`ProjectAndIssueTypePair`](/docs/schema/project-and-issue-type-pair.md) |  |
| `statusReference` | `string` | A status reference. |
| `transitionId` | `string` | A transition ID. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowValidationError](/docs/schema/workflow-validation-error.md) |
