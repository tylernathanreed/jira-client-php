# Task Progress Bean Json Node

Details about a task.

Source: [`Jira\Client\Schema\TaskProgressBeanJsonNode`](/src/Schema/TaskProgressBeanJsonNode.php)

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

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PrioritySchemeId](/docs/schema/priority-scheme-id.md) |
| [UpdatePrioritySchemeResponseBean](/docs/schema/update-priority-scheme-response-bean.md) |
