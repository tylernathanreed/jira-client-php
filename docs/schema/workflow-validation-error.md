# Workflow Validation Error

The details about a workflow validation error.

Source: [`Jira\Client\Schema\WorkflowValidationError`](/src/Schema/WorkflowValidationError.php)

| Property | Type | Description |
| --- | --- | --- |
| `code` | `` | An error code. |
| `elementReference` | `` |  |
| `level` | `'WARNING'|'ERROR'|null` | The validation error level. |
| `message` | `` | An error message. |
| `type` | `'RULE'|'STATUS'|'STATUS_LAYOUT'|'STATUS_PROPERTY'|'WORKFLOW'|'TRANSITION'|'TRANSITION_PROPERTY'|'SCOPE'|'STATUS_MAPPING'|'TRIGGER'|null` | The type of element the error or warning references. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowValidationErrorList](/docs/schema/workflow-validation-error-list.md) |
