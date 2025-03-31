# Task Progress Bean Json Node

Details about a task.

Source: [`Jira\Client\Schema\TaskProgressBeanJsonNode`](/src/Schema/TaskProgressBeanJsonNode.php)

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `int` | The execution time of the task, in milliseconds. |
| `id` | `string` | The ID of the task. |
| `lastUpdate` | `int` | A timestamp recording when the task progress was last updated. |
| `progress` | `int` | The progress of the task, as a percentage complete. |
| `self` | `string` | The URL of the task. |
| `status` | `'ENQUEUED'\|'RUNNING'\|'COMPLETE'\|'FAILED'\|'CANCEL_REQUESTED'\|'CANCELLED'\|'DEAD'` | The status of the task. |
| `submitted` | `int` | A timestamp recording when the task was submitted. |
| `submittedBy` | `int` | The ID of the user who submitted the task. |
| `description` | `string` | The description of the task. |
| `finished` | `int` | A timestamp recording when the task was finished. |
| `message` | `string` | Information about the progress of the task. |
| `result` | `JsonNode` | The result of the task execution. |
| `started` | `int` | A timestamp recording when the task was started. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [PrioritySchemeId](/docs/schema/priority-scheme-id.md) |
| [UpdatePrioritySchemeResponseBean](/docs/schema/update-priority-scheme-response-bean.md) |
