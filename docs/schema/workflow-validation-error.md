# Workflow Validation Error

The details about a workflow validation error.

Source: [`Jira\Client\Schema\WorkflowValidationError`](/src/Schema/WorkflowValidationError.php)

| Property | Type | Description |
| --- | --- | --- |
| `code` | `string` | An error code. |
| `elementReference` | [`WorkflowElementReference`](/docs/schema/workflow-element-reference.md) |  |
| `level` | `'WARNING'\|'ERROR'\|null` | The validation error level. |
| `message` | `string` | An error message. |
| `type` | `'RULE'\|`<br/>`'STATUS'\|`<br/>`'STATUS_LAYOUT'\|`<br/>`'STATUS_PROPERTY'\|`<br/>`'WORKFLOW'\|`<br/>`'TRANSITION'\|`<br/>`'TRANSITION_PROPERTY'\|`<br/>`'SCOPE'\|`<br/>`'STATUS_MAPPING'\|`<br/>`'TRIGGER'\|`<br/>`null` | The type of element the error or warning references. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowValidationErrorList](/docs/schema/workflow-validation-error-list.md) |
