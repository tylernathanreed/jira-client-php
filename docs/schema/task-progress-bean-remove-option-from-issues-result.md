# Task Progress Bean Remove Option From Issues Result

Details about a task.

Source: [`Jira\Client\Schema\TaskProgressBeanRemoveOptionFromIssuesResult`](/src/Schema/TaskProgressBeanRemoveOptionFromIssuesResult.php)

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `` | The execution time of the task, in milliseconds. |
| `id` | `` | The ID of the task. |
| `lastUpdate` | `` | A timestamp recording when the task progress was last updated. |
| `progress` | `` | The progress of the task, as a percentage complete. |
| `self` | `` | The URL of the task. |
| `status` | `'ENQUEUED'|'RUNNING'|'COMPLETE'|'FAILED'|'CANCEL_REQUESTED'|'CANCELLED'|'DEAD'` | The status of the task. |
| `submitted` | `` | A timestamp recording when the task was submitted. |
| `submittedBy` | `` | The ID of the user who submitted the task. |
| `description` | `` | The description of the task. |
| `finished` | `` | A timestamp recording when the task was finished. |
| `message` | `` | Information about the progress of the task. |
| `result` | `` | The result of the task execution. |
| `started` | `` | A timestamp recording when the task was started. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptions](/docs/operations/issue-custom-field-options.md) | [replaceCustomFieldOption](/docs/operations/issue-custom-field-options.md#replace-custom-field-option) |
| [IssueCustomFieldOptionsApps](/docs/operations/issue-custom-field-options-apps.md) | [replaceIssueFieldOption](/docs/operations/issue-custom-field-options-apps.md#replace-issue-field-option) |

### Schema

*None*
