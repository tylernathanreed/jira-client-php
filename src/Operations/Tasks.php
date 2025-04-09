<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Tasks
{
    /**
     * Returns the status of a "long-running asynchronous task"
     * 
     * When a task has finished, this operation returns the JSON blob applicable to the task.
     * See the documentation of the operation that created the task for details.
     * Task details are not permanently retained.
     * As of September 2019, details are retained for 14 days although this period may change without notice
     * 
     * **Deprecation notice:** The required OAuth 2.0 scopes will be updated on June 15, 2024
     * 
     *  - `read:jira-work`
     * 
     * **"Permissions" required:** either of:
     * 
     *  - *Administer Jira* "global permission"
     *  - Creator of the task.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $taskId The ID of the task.
     */
    public function getTask(
        string $taskId,
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/task/{taskId}',
            method: 'get',
            path: compact('taskId'),
            success: 200,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }

    /**
     * Cancels a task
     * 
     * **"Permissions" required:** either of:
     * 
     *  - *Administer Jira* "global permission"
     *  - Creator of the task.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $taskId The ID of the task.
     */
    public function cancelTask(
        string $taskId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/task/{taskId}/cancel',
            method: 'post',
            path: compact('taskId'),
            success: 202,
            schema: true,
        );
    }
}
