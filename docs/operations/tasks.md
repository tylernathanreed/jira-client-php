# Tasks

Source: [`Jira\Client\Operations\Tasks`](/src/Operations/Tasks.php)

## Operations

- [Get Task](#getTask)
- [Cancel Task](#cancelTask)

## Get Task
<a name="getTask"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-tasks/#api-rest-api-3-task-task-id-get

Returns the status of a "long-running asynchronous task"

When a task has finished, this operation returns the JSON blob applicable to the task.
See the documentation of the operation that created the task for details.
Task details are not permanently retained.
As of September 2019, details are retained for 14 days although this period may change without notice

**Deprecation notice:** The required OAuth 2.0 scopes will be updated on June 15, 2024

 - `read:jira-work`

**"Permissions" required:** either of:

 - *Administer Jira* "global permission"
 - Creator of the task.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\TaskProgressBeanObject $response */
$response = $client->getTask(
    taskId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` | The ID of the task. |

#### Response

Source: [`Jira\Client\Schema\TaskProgressBeanObject`](/docs/schema/task-progress-bean-object.md)

Details about a task.

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `int` | The execution time of the task, in milliseconds. |
| `id` | `string` | The ID of the task. |
| `lastUpdate` | `int` | A timestamp recording when the task progress was last updated. |
| `progress` | `int` | The progress of the task, as a percentage complete. |
| `self` | `string` | The URL of the task. |
| `status` | `'ENQUEUED'\|`<br/>`'RUNNING'\|`<br/>`'COMPLETE'\|`<br/>`'FAILED'\|`<br/>`'CANCEL_REQUESTED'\|`<br/>`'CANCELLED'\|`<br/>`'DEAD'` | The status of the task. |
| `submitted` | `int` | A timestamp recording when the task was submitted. |
| `submittedBy` | `int` | The ID of the user who submitted the task. |
| `description` | `string` | The description of the task. |
| `finished` | `int` | A timestamp recording when the task was finished. |
| `message` | `string` | Information about the progress of the task. |
| `result` | `mixed` | The result of the task execution. |
| `started` | `int` | A timestamp recording when the task was started. |


## Cancel Task
<a name="cancelTask"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-tasks/#api-rest-api-3-task-task-id-cancel-post

Cancels a task

**"Permissions" required:** either of:

 - *Administer Jira* "global permission"
 - Creator of the task.
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` | The ID of the task. |

#### Response

`true`
